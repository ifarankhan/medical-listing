<?php

namespace App\Repositories;

use App\Models\Review;
use App\Repositories\Interfaces\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function __construct(private readonly Review $review)
    {}
    public function findById(int $id): ?Review
    {
        // This return Review model instance.
        return $this->review->where('id', $id)
            ->first();
    }
}
