<?php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\Subscription;
use App\Models\Listing;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request): JsonResponse
    {
        Log::info(json_encode($request->all()));
        // Set your Stripe secret key
        Stripe::setApiKey(config('stripe.secret'));

        // Retrieve the request's body and signature
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = config('stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'invoice.payment_succeeded':
                $invoice = $event->data->object;
                $subscriptionId = $invoice->subscription;

                // Update the subscription and listing tables
                $subscription = Subscription::where('stripe_subscription_id', $subscriptionId)->first();
                if ($subscription) {
                    $subscription->status = 'active';
                    $subscription->save();

                    $listing = Listing::find($subscription->listing_id);
                    if ($listing) {
                        $listing->update(['listing_status' => 'subscribed']);
                    }
                }
                break;
            case 'customer.subscription.deleted':
                $subscription = $event->data->object;
                $subscriptionId = $subscription->id;

                // Handle subscription deletion
                $subscription = Subscription::where('stripe_subscription_id', $subscriptionId)->first();
                if ($subscription) {
                    $subscription->status = 'cancelled';
                    $subscription->save();

                    $listing = Listing::find($subscription->listing_id);
                    if ($listing) {
                        $listing->update(['listing_status' => 'unsubscribed']);
                    }
                }
                break;
            // Handle other event types as needed
            default:
                // Unexpected event type
                Log::warning('Unhandled event type: ' . $event->type);
                return response()->json(['error' => 'Unhandled event type'], 400);
        }

        return response()->json(['success' => 'Webhook handled']);
    }
}
