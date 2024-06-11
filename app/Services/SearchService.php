<?php

namespace App\Services;

use App\Models\Listing;

class SearchService
{
    public function search($filters)
    {
        $query = Listing::query();

        if (!empty($filters['category'])) {

            $query->whereHas('productService', function($q) use ($filters) {
                $q->whereHas('category', function ($q) use ($filters) {
                    $q->where('slug', $filters['category']);
                });
            });
        }

        //echo $query->getQuery()->toSql();exit;
        return $query->get();
    }
}
