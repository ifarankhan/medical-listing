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
        'payment_intent_id',
        'status',
        'interval',
        'stripe_price_id',
        'started_at',
        'canceled_at',
    ];
    // Cast `started_at` to a date to ensure it's treated as a Carbon instance.
    protected $casts = [
        'started_at' => 'datetime',
        'canceled_at' => 'datetime',
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function storeSubscription(
        $listingId,
        $stripeSubscriptionId,
        $status,
        $interval = null,
        $lastPaymentAmount = null,
        $paymentIntentId = null,
        $canceledAt = null
    ): void {
        $data = [
            'listing_id'          => $listingId,
            'status'              => $status,
            'interval'            => $interval ?? null,
            'last_payment_amount' => $lastPaymentAmount ?? null,
            'payment_intent_id' => $paymentIntentId ?? null,
            'canceled_at'         => $canceledAt ?? null,
        ];
        // Remove null.
        $data = array_filter($data, function ($value) {
            return ! is_null($value);
        });

        self::updateOrCreate([
            'stripe_subscription_id' => $stripeSubscriptionId,
        ], $data);
    }
}
