<?php

namespace App\Models;

use App\Http\Controllers\ListingController;
use App\Services\PhoneService;
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
    CONST STATUS_ACTIVE_TRIAL = 'active_trial';
    CONST STATUS_EXPIRED_TRIAL = 'trial_expired';

    const STATUS_PAID = 'paid';
    const STATUS_PENDING = 'pending';

    const STATUS_CANCELLED = 'canceled';
    CONST STATUS_REFUNDED = 'refunded';

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

    protected ?PhoneService $phoneService = null;

    public function getPhoneService(): PhoneService
    {
        // Resolve the service lazily using the app() helper
        return $this->phoneService ?? app(PhoneService::class);
    }
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

    /**
     * Get formatted listing status text.
     *
     * @return string
     */
    public function getFormattedStatus(): string
    {
        return match ($this->listing_status) {

            self::STATUS_ACTIVE_TRIAL => 'Active',
            self::STATUS_EXPIRED_TRIAL => 'Trial Expired',
            default => $this->listing_status,
        };
    }

    public function details(): HasMany
    {
        return $this->hasMany(ListingDetail::class);
    }

    public function getDetailsMapAttribute()
    {
        return $this->details->pluck('value', 'key')->toArray();
    }

    public function getDetail($key, $default = '')
    {
        return $this->detailsMap[$key] ?? $default;
    }

    public function getBusinessStatesFormatted(): string
    {
        $businessStates = $this->detailsMap['business_states'] ?? null;
        if (empty($businessStates)) {
            return '';
        }
        // Fetch states in comma separated formated for formatted view.
        $decodedStates = json_decode($businessStates);

        $states = State::whereIn('id', $decodedStates)->pluck('name')->toArray();

        return implode(',', $states);
    }

    public function getFormattedContactNumberAttribute(): string
    {
        $contact = $this->attributes['contact_number'];
        return $this->getPhoneService()->formatPhoneNumber($contact);
    }

    public function getFormattedBusinessContactAttribute(): string
    {
        $contact = $this->attributes['business_contact'];
        return $this->getPhoneService()->formatPhoneNumber($contact);
    }
}
