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
        'status',
        'interval',
        'stripe_price_id',
        'started_at',
        'canceled_at',
    ];
    // Cast `started_at` to a date to ensure it's treated as a Carbon instance.
    protected $casts = [
        'started_at' => 'datetime',
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
