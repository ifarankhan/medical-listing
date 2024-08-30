<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class SubscriptionController extends Controller
{
    const BASIC_PRODUCT = 'prod_QbuPEDi4VgX5x2';
    CONST YEARLY_PRODUCT = 'prod_QbuPerPo3q22fm';

    const STRIPE_DAILY_TEST = 'prod_QkcaG8TzYcCzLv';

    public function __construct(protected Subscription $subscription) {}
    public function showSubscriptionForm(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        // Only one business profile per user for listing.
        $listing = $user->listings()->firstOrFail();
        // Check if user is already subscribed.
        $existingSubscription = $listing->subscription()->first();

        if ($existingSubscription) {

            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription already exist.');
        }

        try {
            $stripe = $this->getStripe();

            // Validate the request data
            $request->validate([
                'amount'   => 'required|numeric|min:1',
                'interval' => 'required|in:month,year,daily',
                //  'payment_method_id' => 'required|string', // Payment method ID from the frontend
            ]);

            // Create a Stripe customer
            $customer = $this->createStripeCustomer($stripe, $user->email);
            $paymentIntent = $this->createStripePaymentIntent(
                $stripe,
                $request->amount,
                $customer->id,
                $listing->id,
                $request->interval
            );
            // Store payment intent in local database.
            $this->subscription->storeSubscription(
                $listing->id,
                $paymentIntent->id,
                $paymentIntent->status,
                $request->interval
            );

            return view('subscription.form', compact('listing', 'paymentIntent', 'customer'));
        } catch (Exception $e) {
            Log::error('Subscription creation failed: ' . $e->getMessage());

            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription creation failed.');
        }
    }
    /**
     * @throws ApiErrorException
     */
    private function createStripeCustomer($stripe, $email)
    {
        $customers = $stripe->customers;

        $customerData = ['email' => $email];
        return ! $customers->all($customerData)->count()
            ? $customers->create($customerData)
            : $customers->all($customerData)->first();
    }

    /**
     * @throws ApiErrorException
     */
    private function createStripePrice(StripeClient $stripe, $amount, $interval, $listing)
    {
        // Fetch stripe product.
        if ($interval == 'month') {
            $product = self::BASIC_PRODUCT;
        } elseif ($interval == 'year') {
            $product = self::YEARLY_PRODUCT;
        } else {
            // Handle other cases or assign a default value
            $product = self::STRIPE_DAILY_TEST; // For testing.
        }

        $productData = $stripe->products->retrieve($product);

        // Check if the price exists for this product
        $prices = $stripe->prices->all(['product' => $productData->id, 'limit' => 1]);

        foreach ($prices->data as $price) {
            if ($price->unit_amount == $amount && $price->recurring->interval == $interval) {
                return $price;
            }
        }
        // Create a price dynamically
        return $stripe->prices->create([
            'unit_amount' => $amount, // Already in cents
            'currency' => 'usd',
            'recurring' => ['interval' => $interval],
            'product' => $productData->id,
        ]);
    }

    private function createStripeSubscription($stripe, $paymentIntent, $price)
    {
        return $stripe->subscriptions->create([
            'customer' => $paymentIntent->customer,
            'items'    => [
                ['price' => $price->id],
            ],
            'default_payment_method' => $paymentIntent->payment_method,
        ]);
    }

    private function createStripePaymentIntent($stripe, $amount, $customerId, $listingId, $interval)
    {
        $data = [
            'amount'               => $amount * 100,
            'setup_future_usage' => 'off_session',
            'currency'             => 'usd',
            'customer'             => $customerId,
            // 'automatic_payment_methods' => ['enabled' => true],
            'payment_method_types' => ['card'],
            'metadata'             => [
                'listing_id' => $listingId,
                'interval'   => $interval,
            ],
        ];

        return $stripe->paymentIntents->create($data);
    }


    /**
     * @throws ApiErrorException
     */
    public function processCallback(Request $request): RedirectResponse
    {
        $stripe = $this->getStripe();
        $listing = Auth::user()->listings()->first();

        try {
            // Start a transaction
            DB::beginTransaction();
            // Retrieve the payment intent
            $paymentIntent = $stripe->paymentIntents->retrieve($request->get('payment_intent'));

            if ($paymentIntent->status == 'succeeded') {
                // Get the listing ID and subscription ID from the metadata
                $listingId = $paymentIntent->metadata->listing_id;
                $interval  = $paymentIntent->metadata->interval;
                $amount    = $paymentIntent->amount;

                // Find the listing
                $listing      = Auth::user()->listings()->findOrFail($listingId);

                // Attach the payment method to the customer
                $stripe->paymentMethods->attach(
                    $paymentIntent->payment_method,
                    ['customer' => $paymentIntent->customer]
                );

                // Set the default payment method on the customer
                $stripe->customers->update($paymentIntent->customer, [
                    'invoice_settings' => ['default_payment_method' => $paymentIntent->payment_method]
                ]);

                $listing->update(['listing_status' => 'subscribed']);

                $this->subscription->storeSubscription(
                    $listing->id,
                    $paymentIntent->id,
                    $paymentIntent->status,
                    $interval
                );

                $amount = $amount / 100; // Amount in cents.
                DB::commit();
                return redirect()->route('listing.index', $listing)
                    ->with('success', "You have successfully subscribed to this listing for $$amount/$interval.");
            }

            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription creation failed. Please try again.');
        } catch (\Exception $e) {

            // Rollback the transaction
            DB::rollBack();

            Log::error('Payment processing failed: ' . $e->getMessage());

            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription creation failed. Please try again.');
        }
    }

    private function getStripe(): StripeClient
    {
        return new StripeClient(config('stripe.secret'));
    }
}
