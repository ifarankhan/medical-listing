<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductService extends Model
{
    use HasFactory;
    protected $fillable = [
        'listing_id',
        'category_id',
        'name',
        'description',
        'virtual',
        'in_person',
        'accept_insurance',
        'insurance_list',
        'price',
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
