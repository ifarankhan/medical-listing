<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct(
        protected readonly ReviewService $reviewService,
    )
    {}

    public function index(): Factory|View|Application
    {
        return view('review.index');
    }

    public function store(StoreReviewRequest $request): JsonResponse
    {
        $hasReviewed = $this->reviewService->setUserId(Auth::id())
            ->storeReview($request);
        // Check if user already reviewed this listing
        if ($hasReviewed) {
            return response()->json([
                'success' => false,
                'error' => 'You have already reviewed this listing.'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully.'
        ]);
    }
}
