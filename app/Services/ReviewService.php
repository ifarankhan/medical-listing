<?php

namespace App\Services;

use App\Events\ReviewCreatedEvent;
use App\Http\Requests\StoreReviewRequest;
use App\Mail\RequestReviewMail;
use App\Models\Review;
use App\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use InvalidArgumentException;

class ReviewService
{
    protected int $userId;
    protected int $listingId;

    public function __construct(
        protected readonly Review $review,
        protected readonly ReviewRepositoryInterface $reviewRepository,
    )
    {}

    public function storeReview(StoreReviewRequest $request)
    {
        $this->setListingId($request->listing_id)
             ->userHasReviewed();
        // Store review
        $review = $this->review->create([
            'listing_id'  => $request->listing_id,
            'customer_id' => $this->userId,
            'rating'      => $request->rating,
            'review_text' => $request->review_text,
        ]);
        // Dispatch event.
        event(new ReviewCreatedEvent($review->getKey()));

        return $review;
    }

    private function userHasReviewed(): void
    {
        $hasReviewed = $this->review->where(
            'listing_id',
            $this->listingId
        )->where(
            'customer_id',
            $this->userId
        )->exists();

        if ($hasReviewed) {
            throw new InvalidArgumentException(
                'You have already reviewed this listing.'
            );
        }
    }

    public function sendReviewRequest(): void
    {
        $customer = $this->reviewRepository->getCustomerById(
            $this->getUserId()
        );

        $listing = $this->reviewRepository->getListingById(
            $this->getListingId()
        );

        if (!$customer || !$listing) {
            throw new InvalidArgumentException('Invalid customer or listing.');
        }
        // Send email (queued for performance)
        Mail::to($customer->email)->queue(
            new RequestReviewMail(
                $customer,
                $listing
            )
        );
    }


    public function setUserId(int $userId): ReviewService
    {
        $this->userId = $userId;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setListingId(int $listingId): ReviewService
    {
        $this->listingId = $listingId;

        return $this;
    }

    public function getListingId(): int
    {
        return $this->listingId;
    }
}
