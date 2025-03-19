<?php

namespace App\Repositories;

use App\Models\Listing;
use App\Models\Review;
use App\Models\User;
use App\Repositories\Interfaces\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function __construct(
        private readonly Review $review,
        private readonly Listing $listing,
        private readonly User $user,
    )
    {}
    public function findById(int $id): ?Review
    {
        // This return Review model instance.
        return $this->review->where('id', $id)
            ->first();
    }

    public function getCustomerById(int $id): ?User
    {
        return $this->user->where('id', $id)->first();
    }

    public function getListingById(int $id): ?Listing
    {
        return $this->listing->where('id', $id)->first();
    }
}
