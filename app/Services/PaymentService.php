<?php

namespace App\Services;

use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;
use Stripe\Subscription;

class PaymentService
{
    public function __construct(protected StripeClient $stripeClient) {}

    /**
     * @throws ApiErrorException
     */
    public function cancelPayment($paymentIntentId): Subscription
    {
        return $this->stripeClient->subscriptions->cancel($paymentIntentId);
    }
}
