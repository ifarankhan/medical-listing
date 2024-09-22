<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'listing_id',
        'stripe_subscription_id',
        'stripe_price_id',
        'stripe_customer_id',
        'status',
        'started_date',
        'end_date',
        'deleted_at',
        'created_at',
        'updated_at',

    ];
    // Cast `started_at` to a date to ensure it's treated as a Carbon instance.
    /*protected $casts = [
        'started_at' => 'datetime',
        'canceled_at' => 'datetime',
    ];*/

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

    public function archive(): void
    {
        // Copy the current subscription data to the archived_subscriptions table
        DB::table('archived_subscriptions')->insert([
            'user_id' => $this->user_id,
            'stripe_subscription_id' => $this->stripe_subscription_id,
            'stripe_customer_id' => $this->stripe_customer_id,
            'stripe_price_id' => $this->stripe_price_id,
            'status' => $this->status,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'deleted_at' => now(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
    }

    public function pendingSubscriptionExists($userId, $listingId)
    {
        return $this->where('user_id', $userId)
            ->where('listing_id', $listingId)
            ->where('status', 'pending')
            ->exists();
    }
}
