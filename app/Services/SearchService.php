<?php

namespace App\Services;

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SearchService
{
    const RESULT_THRESHOLD = 12;

    public array $filters = [
        'category' => 'filterByCategory',
        'q' => 'filterByString',
        'zip_code' => 'filterByZipCode',
    ];
    public function search(array $filters, $paginate = self::RESULT_THRESHOLD): LengthAwarePaginator
    {
        $query = Listing::query();
        $query->where('listing_status', ListingController::STATUS_SUBSCRIBED);
        foreach ($filters as $filter => $value) {

            if (!empty($value) && isset($this->filters[$filter])) {

                $method = $this->filters[$filter];
                if (method_exists($this, $method)) {

                    $this->$method($query, $value);
                }
            }
        }
        // echo $query->getQuery()->toSql();exit;
        return $query->paginate($paginate);
    }

    protected function filterByCategory($query, string $category): void
    {
        $query->whereHas('productService', function($q) use ($category) {
            $q->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        });
    }

    protected function filterByString($query, string $term): void
    {
        $query->where(function($q) use ($term) {
            $q->where('business_name', 'like', '%' . $term . '%');
        });
    }

    protected function filterByZipCode(string $zipCode)
    {
    }
}
