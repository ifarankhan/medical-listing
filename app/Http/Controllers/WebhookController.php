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

        $data = $event->data->object;

        // Handle the event
        switch ($event->type) {

            case 'invoice.payment_succeeded':

                $this->handleInvoicePaymentSucceeded($data);

                break;
            case 'invoice.payment_failed':

                $this->handleInvoicePaymentFailed($data);
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

    protected function handleInvoicePaymentSucceeded($invoice): void
    {
        // You can update your subscription status or perform other actions
        $subscriptionId = $invoice->subscription;
        $amountPaid = $invoice->amount_paid;

        // Find the subscription in your database
        $subscription = Subscription::where('stripe_subscription_id', $subscriptionId)->first();

        if ($subscription) {

            $listing = Listing::find($subscription->listing_id);
            if ($listing) {
                $listing->update(['listing_status' => 'subscribed']);
            }
            // Update subscription details or perform other actions
            $subscription->update([
                'status' => 'active', // or any other relevant field
                'last_payment_amount' => $amountPaid / 100, // convert to dollars
            ]);

            Log::info('Subscription payment succeeded for subscription ID: ' . $subscriptionId);
        }
    }

    protected function handleInvoicePaymentFailed($invoice): void
    {
        $subscriptionId = $invoice->subscription;

        // Find the subscription in your database
        $subscription = Subscription::where('stripe_subscription_id', $subscriptionId)->first();

        if ($subscription) {

            $listing = Listing::find($subscription->listing_id);
            if ($listing) {
                $listing->update(['listing_status' => 'unsubscribed']);
            }
            // Update subscription details
            $subscription->update([
                'status' => 'past_due',
                'payment_intent_status' => 'failed',
            ]);

            Log::warning('Subscription payment failed for subscription ID: ' . $subscriptionId);
        }
    }
}
