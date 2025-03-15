<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $listingId
 * @property mixed $customer_id
 * @property Listing $listing
 * @property User $customer
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'customer_id', 'rating', 'review_text'];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function getFormattedCreatedAtAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('F d, Y');
    }
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
