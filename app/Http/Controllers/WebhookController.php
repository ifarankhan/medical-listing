<?php
namespace App\Http\Controllers;

use App\Mail\SubscriptionCanceledMail;
use App\Mail\SubscriptionConfirmationMail;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        // Retrieve the request's body and signature.
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        // Use this for testing with CLI.
        $endpointSecret = config('services.stripe.webhook_secret');

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
        Log::info('checkout.session.completed');
        $userId = $session->client_reference_id; // Use the client_reference_id (reference to actual user id in system) to find the user
        $stripeSubscriptionId = $session->subscription;
        $stripeCustomerId = $session->customer;
        $listingId = $session->metadata->listing_id;
        $interval = $session->metadata->interval;

        try {
            $user = User::find($userId);
            $listing = Listing::find($listingId);
            $subscriptionModel = $this->subscription->where('listing_id', $listingId)->first();

            if ($subscriptionModel) {
                $subscriptionModel->stripe_subscription_id = $stripeSubscriptionId;
                $subscriptionModel->stripe_customer_id = $stripeCustomerId;
                $subscriptionModel->start_date = now();
                $subscriptionModel->status = Subscription::STATUS_ACTIVE;
                $subscriptionModel->save();

                $listing->listing_status = ListingController::STATUS_SUBSCRIBED;
                $listing->save();
                // Send the subscription confirmation email
                Mail::to($user->email)->send(new SubscriptionConfirmationMail($user, $listing, $interval));
            }
        } catch (\Exception $ex) {

            Log::error($ex->getMessage());
        }
    }
    protected function handleInvoicePaymentSucceeded(Invoice $invoice): void
    {
        Log::info('invoice.payment_succeeded');
        // You can update your subscription status or perform other actions
        $subscriptionId = $invoice->subscription;
        $paymentIntentId = $invoice->payment_intent;
        $interval = $this->paymentService->getProductIntervalByStripeSubscriptionId($subscriptionId);
        Log::info($interval);
        // Find the subscription in your database
        $subscriptionModel = $this->subscription->where('stripe_subscription_id', $subscriptionId)->first();

        if ($subscriptionModel) {

            $subscriptionModel->updated_at = now();
            $subscriptionModel->status = Subscription::STATUS_ACTIVE;
            $subscriptionModel->payment_intent_id = $paymentIntentId;
            $subscriptionModel->save();

            $listing = Listing::find($subscriptionModel->listing_id);
            $listing->listing_status = ListingController::STATUS_SUBSCRIBED;
            $listing->save();
            $user = $listing->user;
            Log::info('Subscription payment succeeded for subscription ID: ' . $subscriptionId);
            // Send the subscription confirmation email
            Mail::to($user->email)->send(new SubscriptionConfirmationMail($user, $listing, $interval));
        }
    }

    protected function handleInvoicePaymentFailed($invoice): void
    {
        Log::info('invoice.payment.failed');
        $subscriptionId = $invoice->subscription;
        // Find the subscription in your database
        $subscription = Subscription::where('stripe_subscription_id', $subscriptionId)->first();

        if ($subscription) {

            $listing = Listing::find($subscription->listing_id);
            if ($listing) {
                $listing->update(['listing_status' => 'failed']);
            }
            // Update subscription details
            $subscription->update([
                'status' => 'pending',
            ]);

            Log::warning('Subscription payment failed for subscription ID: ' . $subscriptionId);
        }
    }

    protected function handleCustomerSubscriptionDeleted(\Stripe\Subscription $subscription): void
    {
        Log::info('customer.subscription.deleted');

        $subscriptionId = $subscription->id;
        // Handle subscription deletion
        $subscriptionModel = $this->subscription->where('stripe_subscription_id', $subscriptionId)->first();

        if ($subscriptionModel) {

            $subscriptionModel->status = Subscription::STATUS_CANCELED;
            $subscriptionModel->end_date = $subscription->canceled_at;

            $subscriptionModel->save();

           $archivedData = $subscriptionModel->toArray();
            // Insert the subscription data into the archive_subscriptions table.
            $this->subscription->archive($archivedData);
            $subscriptionModel->delete();

            $listing = Listing::find($subscriptionModel->listing_id);
            if ($listing) {
                $listing->update(['listing_status' => 'deleted']);
            }

            $user = $subscriptionModel->listing->user;
            $interval = '';
            // Retrieve the subscription interval.
            if (!empty($subscription->items->data)) {
                $subscriptionItem = $subscription->items->data[0];
                if (isset($subscriptionItem->plan->interval)) {
                    $interval = $subscriptionItem->plan->interval;
                }
            }
            // Send the subscription cancel confirmation email
            Mail::to($user->email)->send(new SubscriptionCanceledMail($user, $listing, $interval));
        }
    }

    /**
     * @throws ApiErrorException
     */
    protected function handleChargeRefunded(Charge $charge): void
    {
        Log::info('charge.refunded');

        try {
            $refundTime = now();
            $paymentIntentId = $charge->payment_intent;
            $subscription = $this->paymentService->getSubscription($paymentIntentId);
            $subscriptionId = $subscription->id;

            if ($charge->refunded) {
                // Find the subscription in database
                $subscriptionModel = Subscription::where('stripe_subscription_id', $subscriptionId)->first();
                if ($subscriptionModel) {
                    $listing = Listing::find($subscriptionModel->listing_id);

                    if ($listing) {
                        $listing->update(['listing_status' => Subscription::STATUS_REFUNDED]); // or any relevant status
                    }
                    // Update subscription details
                    $subscriptionModel->status = Subscription::STATUS_REFUNDED;
                    $subscriptionModel->end_date = $refundTime;
                    $subscriptionModel->save();
                    /*$archivedData = $subscriptionModel->toArray();
                    $subscriptionModel->archive($archivedData);
                    $subscriptionModel->delete();*/

                    Log::info('Charge refunded for subscription ID: ' . $subscriptionId);
                }
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
        Log::info('charge.refund.updated');

        try {
            // Refund cancel.
            if ($data->status == 'canceled') {

                $paymentIntentId = $data->payment_intent;
                $subscription = $this->paymentService->getSubscription($paymentIntentId);
                $subscriptionId = $subscription->id;

                $subscriptionModel = $this->subscription->where('stripe_subscription_id', $subscriptionId)
                                                        ->first();

                if (!$subscriptionModel) {
                    throw new \Exception('Subscription not found');
                }

                // Update subscription details
                $subscriptionModel->status = Subscription::STATUS_ACTIVE;
                $subscriptionModel->start_date = now();
                $subscriptionModel->save();

                $listing = $this->listing->find($subscriptionModel->listing_id);
                if (!$listing) {
                    throw new \Exception('Listing not found');
                }

                $listingStatus = $data->status == 'canceled'?
                    ListingController::STATUS_SUBSCRIBED:
                    ListingController::STATUS_CANCELLED;

                $listing->update(['listing_status' => $listingStatus]);
            }
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
        }
    }
}
