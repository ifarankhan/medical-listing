<?php

namespace App\Services;

use App\Models\Listing;

class SearchService
{
    const RESULT_THRESHOLD = 12;
    public function search($filters, $paginate = self::RESULT_THRESHOLD)
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
        return $query->paginate($paginate);
    }
}
