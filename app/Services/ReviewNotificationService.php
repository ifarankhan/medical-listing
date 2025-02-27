<?php

namespace App\Services;

use App\Repositories\Interfaces\ReviewRepositoryInterface;

class ReviewNotificationService
{
    public function __construct(
        private readonly ReviewRepositoryInterface $reviewRepository,
    )
    {}

    public function sendEmails(int $reviewId)
    {
        $review = $this->reviewRepository->findById($reviewId);

        $listingId = $review->listing->user->id; dd($listingId);
    }
}
