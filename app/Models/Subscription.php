<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Subscription extends Model
{
    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_REFUNDED = 'refunded';

    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'listing_id',
        'stripe_subscription_id',
        'stripe_price_id',
        'stripe_customer_id',
        'payment_intent_id',
        'status',
        'started_date',
        'end_date',
        'created_at',
        'updated_at',

    ];
    // Cast `started_at` to a date to ensure it's treated as a Carbon instance.
    protected $casts = [
        'end_date' => 'datetime',
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

    public function archive(array $data): void
    {
        $data['end_date'] = date('Y-m-d H:i:s', strtotime($data['end_date']));
        $data['deleted_at'] = now();
        $data['created_at'] = date('Y-m-d H:i:s', strtotime($data['created_at']));
        $data['updated_at'] = date('Y-m-d H:i:s', strtotime($data['updated_at']));
        $data['start_date'] = date('Y-m-d H:i:s', strtotime($data['start_date']));
        // Copy the current subscription data to the archived_subscriptions table
        // Use updateOrInsert to update if listing_id exists or insert if it doesn't
        DB::table('archived_subscriptions')->updateOrInsert(
            ['listing_id' => $data['listing_id']], // The condition to check
            $data // The data to update or insert
        );
    }

    public function pendingSubscriptionExists($userId, $listingId)
    {
        return $this->where('user_id', $userId)
            ->where('listing_id', $listingId)
            ->where('status', 'pending')
            ->exists();
    }
}
