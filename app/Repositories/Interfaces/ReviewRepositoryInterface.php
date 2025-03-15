<?php

namespace App\Repositories\Interfaces;

use App\Models\Review;

interface ReviewRepositoryInterface
{
    public function findById(int $id): ?Review;
}
