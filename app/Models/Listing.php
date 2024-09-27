<?php

namespace App\Models;

use App\Http\Controllers\ListingController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Listing extends Model
{
    const STATUS_SUBSCRIBED = 'subscribed';

    protected $fillable = [
        'user_id',
        'authorized',
        'registered',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'address',
        'business_name',
        'ein',
        'business_address',
        'business_contact',
        'business_email',
        'listing_status',
        'selected_package'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function productService(): HasMany
    {
        return $this->hasMany(ProductService::class);
    }

    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    public function activeSubscription(): HasOne|Builder
    {
        return $this->hasOne(Subscription::class)
            ->whereHas('listing', function ($query) {
                $query->whereIn('status', [
                    Subscription::STATUS_ACTIVE,
                    Subscription::STATUS_PENDING
                ]);
            });
    }
}
