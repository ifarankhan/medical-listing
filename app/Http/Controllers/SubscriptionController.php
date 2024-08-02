<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\StripeClient;
use Stripe\Subscription as StripeSubscription;
use Stripe\Price;

class SubscriptionController extends Controller
{
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
                'interval' => 'required|in:month,year',
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

            return view('subscription.form', compact('listing', 'paymentIntent', 'customer'));
        } catch (Exception $e) {
            Log::error('Subscription creation failed: ' . $e->getMessage());

            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription creation failed.');
        }
    }

    public function processPayment(Request $request)
    {
        $stripe = $this->getStripe();

        try {
            $paymentMethodId  = $request->input('payment_method_id');
            $subscriptionData = json_decode($request->input('subscription_data'), true);

            // Attach the payment method to the customer
            $stripe->paymentMethods->attach(
                $paymentMethodId,
                ['customer' => $subscriptionData['stripe_customer_id']]
            );

            // Set the default payment method
            $stripe->customers->update($subscriptionData['stripe_customer_id'], [
                'invoice_settings' => ['default_payment_method' => $paymentMethodId],
            ]);

            // Create the subscription
            $subscription = $stripe->subscriptions->create([
                'customer'               => $subscriptionData['stripe_customer_id'],
                'items'                  => [['price' => $subscriptionData['price_id']]],
                'default_payment_method' => $paymentMethodId,
            ]);

            // Save subscription ID in your database for reference
            Subscription::updateOrCreate(
                ['listing_id' => $subscriptionData['listing_id']],
                [
                    'stripe_subscription_id' => $subscription->id,
                    'status'                 => 'active',
                ]
            );

            return response()->json(['redirect_url' => route('listing.index')]);
        } catch (\Exception $e) {
            Log::error('Payment processing failed: ' . $e->getMessage());

            return response()->json(['error' => 'Payment processing failed. Please try again.']);
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
        $product = $interval == 'month'? 'prod_QZoqmSe5F8LmwH': 'prod_QZoq6qZOituB3n';
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
    public function processCallback(Request $request)
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

                // Create a price dynamically.
                $price = $this->createStripePrice($stripe, $amount, $interval, $listing);

                $subscription = $this->createStripeSubscription($stripe, $paymentIntent, $price);

                $listing->update(['listing_status' => 'subscribed']);
                Subscription::create([
                    'listing_id'             => $listing->id,
                    'stripe_subscription_id' => $subscription->id,
                    'status'                 => 'active',
                    'interval'               => $interval,
                ]);

                $amount = $amount / 100;
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
