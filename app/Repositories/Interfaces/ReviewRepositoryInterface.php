<?php

namespace App\Repositories\Interfaces;

use App\Models\Listing;
use App\Models\Review;
use App\Models\User;

interface ReviewRepositoryInterface
{
    public function findById(int $id): ?Review;

    public function getCustomerById(int $id): ?User;

    public function getListingById(int $id): ?Listing;
}
