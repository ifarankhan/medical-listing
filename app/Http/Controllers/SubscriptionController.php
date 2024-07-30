<?php
/**
 *
 *
 *
 *
 *
 * {
 * "error": {
 * "code": "card_declined",
 * "decline_code": "live_mode_test_card",
 * "doc_url": "https://stripe.com/docs/error-codes/card-declined",
 * "message": "Your card was declined. Your request was in live mode, but used a known test card.",
 * "param": "",
 * "request_log_url": "https://dashboard.stripe.com/logs/req_kXHoBZhxq6NqZD?t=1722154540",
 * "type": "card_error"
 * }
 * }
 *
 *
 * {
 * "c": {
 * "type": "hsw",
 * "req": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJmIjowLCJzIjoyLCJ0IjoidyIsImQiOiJjdHoyU0VyRDQ1U3ZsekFhUm9PdEpuam1VVzJ4NW5OTUJ0QlZEQ3ZBeVVJMVpCeDlRSDdvc2FjSkM1S2RjTmFMSzBmZEsvR2ptclM2RTJVVEdsYlVHZldaN0lHUmlKSURYTzljMUd2TUI3M3FDaFBaUXRJWGVXRlFMNUlNQlRWQ0lad3lNa0ptR0VLb09Xa29vclRLRGhuWVRVSFQzUDd6R2VGMEZxaW84MzVkUlZwT21HL1FMWlo4SFBrcGp2ajJZSjRpcWJUdHNrTm5HM1R3K1Jib0d6Z0c5d3U1cjdFNHQweHJsenAxejVWOWdYU3R5am1sWGRsSWhtanMwMDQ9ZzUvblgxejg0R1NhbmVqMCIsImwiOiJodHRwczovL25ld2Fzc2V0cy5oY2FwdGNoYS5jb20vYy8yZGU3MmQ2MzY3YmViYzc2ODBlNjhiMWIxM2RhMmRmNjk3MWNmZDc0MDA2OGZmZjU1NGY2MDI0NGY5ZWIzZTk0IiwiaSI6InNoYTI1Ni1qTTdnTTA4RGJpd3BTR2VjUTJ5OS84eXA4WUVOcHZuTjVzZWYyUEI1YjBVPSIsImUiOjE3MjIxNTQ5OTksIm4iOiJoc3ciLCJjIjoxMDAwfQ.2ukrDT8q7LTySfRRdlRPkmRk2v_s2W4WemC-peKCbg0"
 * },
 * "success": false,
 * "error-codes": [
 * "expired-session"
 * ]
 * }
 *
 *
 *
 *
 * {
 * "id": "tok_1PhSPHP5DX5k194Sj2MVCjMr",
 * "object": "token",
 * "card": {
 * "id": "card_1PhSPHP5DX5k194ScLAodnBl",
 * "object": "card",
 * "address_city": null,
 * "address_country": null,
 * "address_line1": null,
 * "address_line1_check": null,
 * "address_line2": null,
 * "address_state": null,
 * "address_zip": "44332",
 * "address_zip_check": "unchecked",
 * "brand": "Visa",
 * "country": "US",
 * "cvc_check": "unchecked",
 * "dynamic_last4": null,
 * "exp_month": 4,
 * "exp_year": 2025,
 * "funding": "credit",
 * "last4": "4242",
 * "name": null,
 * "networks": {
 * "preferred": null
 * },
 * "tokenization_method": null,
 * "wallet": null
 * },
 * "client_ip": "154.192.2.60",
 * "created": 1722155083,
 * "livemode": false,
 * "type": "card",
 * "used": false
 * }
 *
 *
 *
 * {
 * "listing_id": 1,
 * "stripe_subscription_id": "sub_1PhSPJP5DX5k194SuOpJMt0s",
 * "interval": "month",
 * "updated_at": "2024-07-28T08:24:43.000000Z",
 * "created_at": "2024-07-28T08:24:43.000000Z",
 * "id": 1
 * }
 *
 *
 * {
 * "id": "pi_3PiHqUP5DX5k194S02906894",
 * "object": "payment_intent",
 * "amount": 2900,
 * "amount_details": {
 * "tip": {}
 * },
 * "automatic_payment_methods": {
 * "allow_redirects": "always",
 * "enabled": true
 * },
 * "canceled_at": null,
 * "cancellation_reason": null,
 * "capture_method": "automatic_async",
 * "client_secret": "pi_3PiHqUP5DX5k194S02906894_secret_9wVtr5z6qcd2J272Yj5Rt2co4",
 * "confirmation_method": "automatic",
 * "created": 1722352814,
 * "currency": "usd",
 * "description": null,
 * "last_payment_error": null,
 * "livemode": false,
 * "next_action": null,
 * "payment_method": "pm_1PiHsNP5DX5k194SnHLkdYXh",
 * "payment_method_configuration_details": null,
 * "payment_method_types": [
 * "card"
 * ],
 * "processing": null,
 * "receipt_email": null,
 * "setup_future_usage": null,
 * "shipping": null,
 * "source": null,
 * "status": "succeeded"
 * }
 *
 */
namespace App\Http\Controllers;

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
    /**
     *
     *
     *
     *
     * @throws ApiErrorException
     */
    public function createSubscription(Request $request): RedirectResponse
    {
        $listing = Listing::findOrFail($request->listing_id);

        try {
            // Start a transaction
            DB::beginTransaction();
            Stripe::setApiKey(config('stripe.secret'));
            // Create Stripe Customer
            $customer = Customer::create([
                'email' => $request->email,
                'source' => $request->stripeToken,
            ]);
            // Convert amount to cents
            $amount = $request->amount * 100; // e.g., 29 -> 2900
            $currency = 'usd';
            $interval = $request->interval; // 'month' or 'year'
            // Create a new price for the subscription
            $price = Price::create([
                'unit_amount' => $amount,
                'currency' => $currency,
                'recurring' => [
                    'interval' => $interval,
                ],
                'product_data' => [
                    'name' => 'Subscription for Listing ' . $listing->name,
                ],
            ]);
            // Create the subscription.
            $stripeSubscription = StripeSubscription::create([
                'customer' => $customer->id,
                'items' => [
                    [
                        'price' => $price->id,
                    ],
                ],
            ]);
            // Save subscription to database.
            Subscription::create([
                'listing_id' => $listing->id,
                'stripe_subscription_id' => $stripeSubscription->id,
                'interval' => $interval,
            ]);
            // Update status of listing.
            $listing = Listing::where('listing_id', $listing->id)->first();
            if ($listing) {
                $listing->update(['listing_status' => 'subscribed']);
            }
            // Commit the transaction
            DB::commit();

            return redirect()->route('listing.index', $listing)
                ->with('success', 'You have successfully subscribed to this listing.');

        } catch (Exception $ex) {
            // Rollback the transaction
            DB::rollBack();
            // Log the exception or handle it as needed
            Log::error('Subscription creation failed: ' . $ex->getMessage());

            return redirect()->route('listing.step.subscription')
                ->with('error', 'Subscription creation failed.');
        }
    }

    public function showSubscriptionForm(Request $request)
    {
        $user = Auth::user();
        // Only one business profile per user for listing.
        $listing = $user->listings()->firstOrFail();

        try {
            $stripe = $this->getStripe();

            // Validate the request data
            $request->validate([
                'amount' => 'required|numeric|min:1',
                'interval' => 'required|in:month,year',
            ]);

            // Create a Stripe customer
            $customer = $this->createStripeCustomer($stripe, $user->email);

            // Create the price for the subscription
            $price = $this->createStripePrice($stripe, $request->amount, $request->interval, $listing->name);

            // Create the subscription
            $subscription = $this->createStripeSubscription($stripe, $customer->id, $price->id);

            // Create the payment intent
            $paymentIntent = $this->createStripePaymentIntent(
                $stripe,
                $request->amount,
                $customer->id,
                $listing->id,
                $subscription->id,
                $subscription->items->data[0]->price->recurring->interval
            );

            // Save subscription ID in your database for reference
            Subscription::create([
                'listing_id' => $listing->id,
                'stripe_subscription_id' => $subscription->id,
                'status' => 'pending', // Or another status
            ]);

            return view('subscription.form', compact('listing', 'paymentIntent', 'customer'));

        } catch (ApiErrorException $e) {

            Log::error('Stripe API error: ' . $e->getMessage());
            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription creation failed due to a Stripe error.');

        } catch (Exception $e) {

            Log::error('Subscription creation failed: ' . $e->getMessage());
            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription creation failed.');
        }
    }

    private function createStripeCustomer($stripe, $email)
    {
        return $stripe->customers->create(['email' => $email]);
    }

    private function createStripePrice($stripe, $amount, $interval, $listingName)
    {
        return $stripe->prices->create([
            'unit_amount' => $amount * 100, // Convert to cents
            'currency' => 'usd',
            'recurring' => ['interval' => $interval],
            'product_data' => ['name' => 'Subscription for Listing ' . $listingName],
        ]);
    }

    private function createStripeSubscription($stripe, $customerId, $priceId)
    {
        return $stripe->subscriptions->create([
            'customer' => $customerId,
            'items' => [['price' => $priceId]],
            'payment_settings' => [
                //The payment method type `customer_balance`
                // cannot be used with subscriptions that have the `collection_method` set to `charge_automatically`.
                //payment_settings[payment_method_types][0]: must be one of ach_credit_transfer, ach_debit,
                // acss_debit, amazon_pay, au_becs_debit, bacs_debit, bancontact, boleto, card, cashapp,
                // customer_balance, eps, fpx, giropay, grabpay, ideal, konbini, link, multibanco, p24,
                // paynow, paypal, promptpay, revolut_pay, sepa_debit, sofort, us_bank_account, or wechat_pay
                'payment_method_types' => ['card'],
                // Add more payment methods if needed
            ],
        ]);
    }

    private function createStripePaymentIntent($stripe, $amount, $customerId, $listingId, $subscriptionId, $interval)
    {
        $data = [
            'amount' => $amount * 100,
            'currency' => 'usd',
            'customer' => $customerId,
            'automatic_payment_methods' => ['enabled' => true],
            'metadata' => [
                'listing_id' => $listingId,
                'subscription_id' => $subscriptionId,
                'interval' => $interval,
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

        try {
            // Retrieve the payment intent
            $paymentIntent = $stripe->paymentIntents->retrieve($request->get('payment_intent'));
echo '<pre>';print_r($paymentIntent->toArray());echo '</pre>';exit;
            // Get the listing ID and subscription ID from the metadata
            $listingId = $paymentIntent->metadata->listing_id;
            $subscriptionId = $paymentIntent->metadata->subscription_id;
            $interval = $paymentIntent->metadata->interval;
            $amount = $paymentIntent->amount/100;

            // Find the listing
            $listing = Auth::user()->listings()->findOrFail($listingId);

            if ($paymentIntent->status == 'succeeded') {
                // Update the subscription record
                Subscription::updateOrCreate(
                    ['listing_id' => $listing->id],
                    [
                        'stripe_subscription_id' => $subscriptionId,
                        'interval' => $interval,
                        'status' => 'active',
                    ]
                );
                // Update the listing status
                $listing->update(['listing_status' => 'subscribed']);

//                return redirect()->route('listing.index', $listing)
//                    ->with('success', "You have successfully subscribed to this listing for $amount/$interval.");
            }

            return redirect()->route('listing.index', $listing)
                             ->with('error', 'Subscription creation failed. Please try again.');
        } catch (\Exception $e) {
            Log::error('Payment processing failed: ' . $e->getMessage());

            return redirect()->route('listing.index')
                             ->with('error', 'Subscription creation failed. Please try again.');
        }
    }

    private function getStripe(): StripeClient
    {
        return new StripeClient(config('stripe.secret'));
    }
}
