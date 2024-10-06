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
         //echo $query->getQuery()->toSql();exit;
        $sql = $query->toSql();
        $bindings = $query->getBindings();
        $fullQuery = vsprintf(str_replace('?', "'%s'", $sql), $bindings);
        //dd($fullQuery);
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

            $q->where('business_name', 'like', '%' . $term . '%')
                ->orWhere('business_name', 'like', '%,' . $term)        // Match at the end
                ->orWhere('business_name', 'like', $term . ',%')        // Match at the beginning
                ->orWhere('business_name', 'like', '%' . $term . '%');
            // Search in the 'insurance_list' of related 'productService'.
        })->orWhereHas('productService', function ($q) use ($term) {
           // $q->whereRaw("FIND_IN_SET(?, insurance_list)", [$term]);
            // this allows partial string to get matched.
            $q->where('insurance_list', 'like', '%' . $term . '%');
        });
    }

    protected function filterByZipCode($query, string $zipCode): void
    {
        $query->where(function($q) use ($zipCode) {

            $q->where('business_zipcode', $zipCode);
        });
    }

    protected function filterByCity($query, string $city): void
    {
        $query->where(function($q) use ($city) {

            $q->where('business_city', $city);
        });
    }
}
