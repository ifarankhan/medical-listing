<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'stripe_subscription_id',
        'payment_intent_status',
        'interval',
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function storeSubscription(
        $listingId,
        $stripeSubscriptionId,
        $paymentIntentStatus,
        $interval = null,
        $lastPaymentAmount = null
    ): void
    {
        $data = [
            'listing_id'             => $listingId,
            'payment_intent_status'  => $paymentIntentStatus,
            'interval'               => $interval ?? null,
            'last_payment_amount'    => $lastPaymentAmount ?? null,
        ];
        // Remove null.
        $data = array_filter($data, function ($value) {
            return !is_null($value);
        });

        self::updateOrCreate([
            'stripe_subscription_id' => $stripeSubscriptionId,
        ], $data);
    }
}
