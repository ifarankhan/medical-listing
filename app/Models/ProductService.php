<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'accepting_clients'
    ];

    // This mutator will automatically remove spaces around commas before saving
    public function setInsuranceListAttribute($value): void
    {
        $this->attributes['insurance_list'] = preg_replace('/\s*,\s*/', ',', $value);
    }

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getAcceptingNewClientsOrWaitlistAttribute(): string
    {
        $item = $this->attributes['accepting_clients'];
        if ($item === null) {
            return '';
        }
        return $item == 1? '(Accepting New Clients)' : '(Waitlist)';
    }
}
