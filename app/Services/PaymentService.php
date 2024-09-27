<?php

namespace App\Services;

use App\Models\Listing;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\StripeClient;
use Stripe\Subscription;
use \App\Models\Subscription as SubscriptionModel;

class PaymentService
{
    const BASIC_PRODUCT = 'prod_QbuPEDi4VgX5x2';
    const YEARLY_PRODUCT = 'prod_QbuPerPo3q22fm';

    const STRIPE_DAILY_TEST = 'prod_QkcaG8TzYcCzLv';

    public function __construct(
        protected StripeClient $stripeClient,
        protected SubscriptionModel $subscriptionModel
    ) {}

    /**
     * @throws ApiErrorException
     */
    public function checkoutSession($userId, $listingId, $interval, $priceId, $returnUrl, $quantity = 1): Session
    {
        // Create checkout session with stripe.
        return $this->stripeClient->checkout->sessions->create([
            'ui_mode'             => 'embedded',
            'line_items'          => [
                [
                    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                    'price'    => $priceId,
                    'quantity' => $quantity,
                ]
            ],
            'mode'                => 'subscription',
            'return_url'          => $returnUrl . '?session_id={CHECKOUT_SESSION_ID}',
            'client_reference_id' => $userId,
            'automatic_tax'       => [
                'enabled' => true,
            ],
            'metadata'            => [
                'listing_id' => $listingId,
                'interval'   => $interval,
                'user_id' => $userId
            ],
        ]);
    }

    /**
     * @throws Exception
     */
    public function getSessionStatus($sessionId): array
    {
        try {
            $session = $this->stripeClient->checkout->sessions->retrieve($sessionId);

            return [
                'status'         => $session->status,
                'customer_email' => $session->customer_details->email,
            ];
        } catch (ApiErrorException $e) {
            throw new Exception('Error retrieving session status: ' . $e->getMessage());
        }
    }

    /**
     * Create or retrieve a Stripe customer.
     *
     * @param string $email
     *
     * @return string
     * @throws ApiErrorException
     * @throws Exception
     */
    public function customer(string $email): string
    {
        try {
            // Check if the customer already exists (optional, based on your logic)
            $customer = $this->stripeClient->customers->all([
                'email' => $email
            ])->data;

            if ( ! empty($customer)) {
                return $customer[0]->id; // Return existing customer ID.
            }

            // Create a new customer if one does not exist
            $customer = $this->stripeClient->customers->create([
                'email' => $email,
            ]);

            return $customer->id;
        } catch (ApiErrorException $e) {
            // Handle Stripe API errors
            throw new Exception('Error creating or retrieving customer: ' . $e->getMessage());
        }
    }

    /**
     * Retrieve the price ID for a given product and interval.
     *
     * @param string $productId
     * @param string $interval
     *
     * @return string|null
     * @throws ApiErrorException
     * @throws Exception
     */
    public function getPriceId(string $productId, string $interval): ?string
    {
        try {
            $prices = $this->stripeClient->prices->all([
                'product' => $productId,
                'limit'   => 1,
            ]);

            foreach ($prices->data as $price) {
                if ($price->recurring->interval === $interval) {
                    return $price->id;
                }
            }

            // Optionally handle the case where no price is found.
            throw new Exception('No price found for the given interval.');
        } catch (ApiErrorException $e) {
            // Handle Stripe API errors.
            throw new Exception('Error retrieving price from Stripe: ' . $e->getMessage());
        }
    }

    /**
     * @throws ApiErrorException
     */
    public function create($user, $priceId): Subscription
    {
        $stripeCustomerId = $this->customer($user->email);

        return $this->stripeClient->subscriptions->create([
            'customer' => $stripeCustomerId,
            'items'    => [
                ['price' => $priceId],
            ],
            'expand'   => ['latest_invoice.payment_intent'],
        ]);
    }

    /**
     * @throws ApiErrorException
     * @throws Exception
     */
    public function cancel(Listing $listing, string $status = 'active'): Subscription
    {
        try {
            $subscriptionModel = $listing->subscription()
                ->first();

            if (!$subscriptionModel) {
                throw new Exception('No subscription found for this listing.');
            }

            $stripeSubscriptionId = $subscriptionModel->stripe_subscription_id;
            $stripeSubscription = $this->stripeClient->subscriptions->retrieve($stripeSubscriptionId);

            if (!$stripeSubscription) {
                throw new Exception('No stripe subscription found.');
            }

            return $this->stripeClient->subscriptions->cancel($stripeSubscription->id, []);

        } catch (Exception $e) {

            Log::error($e->getMessage());
            throw new Exception('Error retrieving subscription: ' . $e->getMessage());
        }
    }

    /**
     * @throws ApiErrorException
     * @throws Exception
     */
    public function getPaymentIntent(Subscription $subscription): ?PaymentIntent
    {
        try {
            // Ensure the latest_invoice ID is valid
            $invoice = $subscription->latest_invoice;
            if (empty($invoice)) {
                throw new Exception('Invalid invoice.');
            }
            // Retrieve the Payment Intent ID
            if (isset($invoice->payment_intent)) {
                return $invoice->payment_intent;
            }

            return null;
        } catch (ApiErrorException $e) {
            throw new Exception('Error retrieving payment intent: ' . $e->getMessage());
        }
    }

    /**
     * @throws ApiErrorException
     * @throws Exception
     */
    public function getSubscription($paymentIntentId): Subscription
    {
        $paymentIntent = $this->stripeClient->paymentIntents->retrieve($paymentIntentId);

        if ( ! isset($paymentIntent->invoice)) {
            throw new Exception('No invoice associated with this PaymentIntent.');
        }

        // Retrieve the Invoice object using its ID
        $invoice = $this->stripeClient->invoices->retrieve($paymentIntent->invoice);

        if ( ! isset($invoice->subscription)) {
            throw new Exception('No subscription associated with this Invoice.');
        }

        // Retrieve the Subscription object using its ID
        return $this->stripeClient->subscriptions->retrieve($invoice->subscription);
    }

    public function getProductIdByIntervalRequest($interval): string
    {
        if ($interval == 'month') {
            $product = self::BASIC_PRODUCT;
        } elseif ($interval == 'year') {
            $product = self::YEARLY_PRODUCT;
        } else {
            // Handle other cases or assign a default value
            $product = self::STRIPE_DAILY_TEST; // For testing.
        }

        return $product;
    }

    public function getProductIntervalByStripeSubscriptionId(string $stripeSubscriptionId): string
    {
        $subscription = $this->stripeClient->subscriptions->retrieve($stripeSubscriptionId);
        // Get the interval from the subscription's plan (e.g., 'monthly', 'yearly').
        return $subscription->items->data[0]->price->recurring->interval;
    }
}
