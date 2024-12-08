<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListingDetail extends Model
{
    use HasFactory;

    protected $fillable = ['listing_id', 'key', 'value'];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
