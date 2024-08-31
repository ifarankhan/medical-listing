<?php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stripe\Invoice;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\Subscription;
use App\Models\Listing;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function __construct(protected Subscription $subscription)
    {
    }

    public function handleWebhook(Request $request): JsonResponse
    {
        // Set your Stripe secret key
        Stripe::setApiKey(config('stripe.secret'));
        // Retrieve the request's body and signature.
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        // Use this for testing with CLI.
        $endpointSecret = config('stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
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
            // For recurring payment callback.
            case 'invoice.payment_succeeded':

                $this->handleInvoicePaymentSucceeded($data);

                break;
            case 'invoice.payment_failed':

                $this->handleInvoicePaymentFailed($data);
                break;

            case 'customer.subscription.deleted':

                $this->handleCustomerSubscriptionDeleted($data);
                break;

            case 'charge.refunded':
                $this->handleChargeRefunded($data);
                break;
            // Handle other event types as needed
            default:
                // Unexpected event type
                Log::warning('Unhandled event type: ' . $event->type);
                return response()->json(['error' => 'Unhandled event type'], 400);
        }

        return response()->json(['success' => 'Webhook handled']);
    }

    protected function handleInvoicePaymentSucceeded(Invoice $invoice): void
    {
        // You can update your subscription status or perform other actions
        $subscriptionId = $invoice->payment_intent;
        $amountPaid = $invoice->amount_paid;
        $status = $invoice->status;
        // Find the subscription in your database
        $subscription = Subscription::where('stripe_subscription_id', $subscriptionId)->first();

        if ($subscription) {

            $listing = Listing::find($subscription->listing_id);
            if ($listing) {
                $listing->update(['listing_status' => 'subscribed']);
            }
            // Update subscription details or perform other actions
            $this->subscription->storeSubscription(
                $listing->id,
                $subscriptionId,
                $status,
                lastPaymentAmount: $amountPaid / 100
            );

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

    protected function handleCustomerSubscriptionDeleted($customer): void
    {
        $subscriptionId = $customer->id;
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
    }

    protected function handleChargeRefunded($charge): void
    {
        $subscriptionId = $charge->subscription;
        $refundAmount = $charge->amount_refunded;

        // Find the subscription in your database
        $subscription = Subscription::where('stripe_subscription_id', $subscriptionId)->first();

        if ($subscription) {
            $listing = Listing::find($subscription->listing_id);
            if ($listing) {
                $listing->update(['listing_status' => 'unsubscribed']); // or any relevant status
            }
            // Update subscription details
            $subscription->update([
                'status' => 'refunded',
                'last_refund_amount' => $refundAmount / 100, // convert to dollars
            ]);

            Log::info('Charge refunded for subscription ID: ' . $subscriptionId);
        }
    }
}
