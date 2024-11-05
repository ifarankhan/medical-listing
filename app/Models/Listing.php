<?php

namespace App\Models;

use App\Http\Controllers\ListingController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property Collection $productService
 */
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
        'business_zipcode',
        'business_city',
        'business_contact',
        'business_email',
        'listing_status',
        'selected_package',
        'profile_picture'
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

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'listing_id');
    }

    public function activeSubscription(): HasOne|Builder
    {
        return $this->hasOne(Subscription::class)
            ->whereHas('listing', function ($query) {
                $query->whereIn('status', [
                    Subscription::STATUS_ACTIVE,
                    Subscription::STATUS_PENDING
                ]);
                $query->where('stripe_subscription_id', '!=', null);
            });
    }

    public function getProductServicesInsuranceList(): string
    {
        $insuranceList = $this->productService->pluck('insurance_list');
        // Fetch related product services and format them into a string.
        return ($insuranceList->isNotEmpty()) ?
                preg_replace('/\s*,\s*/', ', ', trim(
                    $this->productService->pluck('insurance_list')
                        ->filter()
                        ->implode(', '), ', ')
                ) : '';

    }

    /**
     * Get messages count against the listing.
     *
     * @return int
     */
    public function getCustomerLeadsCount(): int
    {
        return $this->hasMany(Message::class, 'listing_id')
            ->select('email')
            ->distinct()
            ->count('email');
    }
}
