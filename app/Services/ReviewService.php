<?php

namespace App\Services;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class ReviewService
{
    protected int $userId;
    protected int $listingId;

    public function __construct(
        protected readonly Review $review,
    )
    {}

    public function storeReview(StoreReviewRequest $request): bool
    {
        try {
            $this->setListingId($request->listingn_id)
                ->userHasReviewed();
            // Store review
            $this->review->create([
                'listing_id'  => $request->listing_id,
                'customer_id' => $this->userId,
                'rating'      => $request->rating,
                'review_text' => $request->review_text,
            ]);

            return true;
        } catch (InvalidArgumentException $e) {

            Log::error($e->getMessage());
            return false;
        }
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

    public function sendEmail()
    {

    }

    public function setUserId(int $userId): ReviewService
    {
        $this->userId = $userId;

        return $this;
    }

    public function setListingId(int $listingId): ReviewService
    {
        $this->listingId = $listingId;

        return $this;
    }
}
