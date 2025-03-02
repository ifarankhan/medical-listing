<?php

namespace App\Services;

use App\Exceptions\ReviewException;
use App\Mail\CustomerReviewMail;
use App\Mail\ServiceProviderReviewMail;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ReviewNotificationService
{
    public function __construct(
        private readonly ReviewRepositoryInterface $reviewRepository,
    )
    {}

    public function send(int $reviewId): void
    {
        $review = $this->reviewRepository->findById($reviewId);

        if (!$review) {
            return; // Handle case where review is deleted before processing.
        }

        try {
            // Send confirmation email to customer.
            Mail::to($review->customer->email)->send(
                new CustomerReviewMail($review)
            );
            // Send notification email to Service Provider.
            Mail::to($review->listing->user->email)->send(
                new ServiceProviderReviewMail($review)
            );
        } catch (ReviewException $exception) {
            Log::error($exception->getMessage());
        }
    }
}
