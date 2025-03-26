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
use Illuminate\Http\Request;
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

    /**
     * Send review request to customer.
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function requestReview(Request $request): JsonResponse
    {
        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'listing_id' => 'required|exists:listings,id',
        ]);

        $sessionKey = 'review_request_sent_' . (int) $request->customer_id;

        if (session()->has($sessionKey)) {

            return response()->json([
                'success' => false,
                'message' => "Review request has already been sent for this session."
            ]);
        }

        try {
            $this->reviewService->setUserId((int) $request->customer_id)
                ->setListingId((int) $request->listing_id)
                ->sendReviewRequest();

            $customer = $this->reviewService->setUserId((int) $request->customer_id)
                ->getCustomerById()
                ?->toArray();

            $customerName = ' '.$customer['name'] ?? '';

            // Store session flag
            session([$sessionKey => true]);

            return response()->json([
                'success' => true,
                'message' => "Email has been sent to the customer$customerName for leaving a review!"
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
