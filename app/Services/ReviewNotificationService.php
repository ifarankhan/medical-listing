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
        private ReviewRepositoryInterface $reviewRepository,
        private EmailService $emailService,
    )
    {}

    public function send(int $reviewId): void
    {
        $review = $this->reviewRepository->findById($reviewId);

        if (!$review) {
            return; // Handle case where review is deleted before processing.
        }

        // Send confirmation email to customer.
        $this->emailService->send(
            $review->customer->email,
            new CustomerReviewMail($review)
        );
        // Send notification email to Service Provider.
        $this->emailService->send(
            $review->listing->user->email,
            new ServiceProviderReviewMail($review)
        );
    }
}
