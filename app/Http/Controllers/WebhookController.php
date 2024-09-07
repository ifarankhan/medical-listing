<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Invoice;
use Stripe\Refund;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\Subscription;
use App\Models\Listing;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function __construct(
        protected Subscription $subscription,
        protected Listing $listing,
        protected PaymentService $paymentService,
    ) {}

    /**
     * @throws ApiErrorException
     */
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
        } catch (SignatureVerificationException $e) {
            // Invalid signature
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        $data = $event->data->object;
        // Handle the event
        switch ($event->type) {

            case 'checkout.session.completed':

                $this->handleCheckoutSessionCompleted($data);
                break;
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
            case 'charge.refund.updated':
                $this->handleChargeRefundUpdated($data);
                break;
            // Handle other event types as needed
            default:
                // Unexpected event type
                Log::warning('Unhandled event type: ' . $event->type);
                return response()->json(['error' => 'Unhandled event type'], 400);
        }

        return response()->json(['success' => 'Webhook handled']);
    }

    protected function handleCheckoutSessionCompleted(Session $session): void
    {
        $userId = $session->client_reference_id; // Use the client_reference_id (reference to actual user id in system) to find the user
        $stripeSubscriptionId = $session->subscription;
        $listingId = $session->metadata->listing_id;
        $interval = $session->metadata->interval;
        $paymentIntentId = $session->payment_intent;
        // Retrieve user and create or update subscription record
        $user = User::find($userId);
        if ($user) {

            $this->subscription->create([
                'user_id' => $user->id,
                'listing_id' => $listingId,
                'interval' => $interval,
                'stripe_price_id' => '',
                'stripe_subscription_id' => $stripeSubscriptionId,
                'payment_intent_id' => $paymentIntentId,
                'status' => $session->status,
                'started_at' => $session->created,
            ]);

            $this->listing->update([
                'listing_id' => $listingId,
                'listing_status' => ListingController::STATUS_SUBSCRIBED
            ]);
        }
    }
    protected function handleInvoicePaymentSucceeded(Invoice $invoice): void
    {
        // You can update your subscription status or perform other actions
        $subscriptionId = $invoice->subscription;
        $amountPaid = $invoice->amount_paid;
        $status = $invoice->status;
        // Find the subscription in your database
        $subscription = Subscription::where('stripe_subscription_id', $subscriptionId)->first();

        if ($subscription) {

            $listing = Listing::find($subscription->listing_id);
            if ($listing) {
                $listing->update(['listing_status' => ListingController::STATUS_SUBSCRIBED]);
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
        Log::info($customer);

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

    /**
     * @throws ApiErrorException
     */
    protected function handleChargeRefunded(Charge $charge): void
    {
        try {
            $refundTime = now();
            $paymentIntentId = $charge->payment_intent;
            $subscription = $this->paymentService->getSubscription($paymentIntentId);
            $subscriptionId = $subscription->id;
            $status = $charge->refunded ? ListingController::STATUS_REFUNDED: 'unknown';

            // Find the subscription in database
            $subscriptionModel = Subscription::where('stripe_subscription_id', $subscriptionId)->first();

            if ($subscriptionModel) {

                $listing = Listing::find($subscriptionModel->listing_id);
                if ($listing) {
                    $listing->update(['listing_status' => 'unsubscribed']); // or any relevant status
                }
                // Update subscription details
                $this->subscription->storeSubscription(
                    $listing->id,
                    $subscriptionId,
                    $status,
                    paymentIntentId: $paymentIntentId,
                    canceledAt: $refundTime
                );

                Log::info('Charge refunded for subscription ID: ' . $subscriptionId);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }

    /**
     * @throws ApiErrorException
     */
    protected function handleChargeRefundUpdated(Refund $data): void
    {
        try {
            // Refund cancel.
            $status = ($data->status == 'canceled') ? 'active': $data->status;

            $paymentIntentId = $data->payment_intent;
            $subscription = $this->paymentService->getSubscription($paymentIntentId);
            $subscriptionId = $subscription->id;

            $subscriptionModel = $this->subscription->where('stripe_subscription_id', $subscriptionId)
                ->first();

            if (!$subscriptionModel) {
                throw new \Exception('Subscription not found');
            }

            // Update subscription details
            $this->subscription->storeSubscription(
                $subscriptionModel->listing_id,
                $subscriptionId,
                $status,
                paymentIntentId: $paymentIntentId,
            );

            $listing = $this->listing->find($subscriptionModel->listing_id);
            if (!$listing) {
                throw new \Exception('Listing not found');
            }

            $listingStatus = $status == 'active'?
                ListingController::STATUS_SUBSCRIBED:
                ListingController::STATUS_CANCELLED;

            $listing->update(['listing_status' => $listingStatus]);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}
