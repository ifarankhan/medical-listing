<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
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
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function productService(): HasMany
    {
        return $this->hasMany(ProductService::class);
    }
}
