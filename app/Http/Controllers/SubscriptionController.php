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
 */
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Customer;
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
    public function createSubscription(Request $request): JsonResponse
    {
        try {
            // Start a transaction
            DB::beginTransaction();

            $listing = Listing::findOrFail($request->listing_id);

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

            // Create the subscription
            $stripeSubscription = StripeSubscription::create([
                'customer' => $customer->id,
                'items' => [
                    [
                        'price' => $price->id,
                    ],
                ],
            ]);

            // Save subscription to database
            $subscription = Subscription::create([
                'listing_id' => $listing->id,
                'stripe_subscription_id' => $stripeSubscription->id,
                'interval' => $interval,
            ]);

            // Update status of data in another table
            $listing = Listing::where('listing_id', $listing->id)->first();
            if ($listing) {
                $listing->update(['status' => 'subscribed']);
            }

            // Commit the transaction
            DB::commit();
        } catch (Exception $ex) {
            // Rollback the transaction
            DB::rollBack();

            // Log the exception or handle it as needed
            Log::error('Subscription creation failed: ' . $ex->getMessage());

            // Optionally, you can throw the exception or return a response
            throw $ex;
        }

        return response()->json($subscription);
    }

    public function showSubscriptionForm(Request $request)
    {
        $listing = Listing::findOrFail($request->listing);
        return view('subscription.form', compact('listing'));
    }
}
