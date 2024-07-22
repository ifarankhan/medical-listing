<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Subscription;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Subscription as StripeSubscription;
use Stripe\Price;

class SubscriptionController extends Controller
{
    /**
     * @throws ApiErrorException
     */
    public function createSubscription(Request $request): JsonResponse
    {
        $listing = Listing::findOrFail($request->listing_id);

        Stripe::setApiKey(config('stripe.secret'));

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

        $subscription = Subscription::create([
            'listing_id' => $listing->id,
            'stripe_subscription_id' => $stripeSubscription->id,
            'interval' => $interval,
        ]);

        return response()->json($subscription);
    }

    public function showSubscriptionForm(Request $request)
    {
        $listings = Listing::all();
        return view('subscription.form', compact('listings'));
    }
}
