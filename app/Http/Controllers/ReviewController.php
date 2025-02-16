<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct(protected readonly Review $review)
    {}

    public function index(): Factory|View|Application
    {
        return view('review.index');
    }

    public function store(StoreReviewRequest $request): JsonResponse
    {
        $user = Auth::user();
        $userId = Auth::id();
        $hasReviewed = $this->review->where(
            'listing_id',
            $request->listing_id
        )->where(
            'customer_id',
            $userId
        )->exists();
        // Check if user already reviewed this listing
        if ($hasReviewed) {
            return response()->json(['error' => 'You have already reviewed this listing.'], 403);
        }

        // Store review
        $this->review->create([
            'listing_id'  => $request->listing_id,
            'customer_id' => $userId,
            'rating'      => $request->rating,
            'review_text' => $request->review_text,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully.'
        ]);
    }
}
