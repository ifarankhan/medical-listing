<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        try {
            $this->reviewService->setUserId(Auth::id())
                ->storeReview($request);

            return response()->json([
                'success' => true,
                'message' => 'Review submitted successfully.'
            ]);

        } catch (Exception $exception) {

            Log::error($exception->getMessage());
            return response()->json([
                'success' => false,
                'message'   => 'You have already reviewed this listing.'
            ], 403);

        }
    }
}
