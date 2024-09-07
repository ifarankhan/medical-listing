<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PaymentService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Subscription as SubscriptionModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SubscriptionController extends Controller
{
    public function __construct(
        protected SubscriptionModel $subscriptionModel,
        protected PaymentService $paymentService
    ) {}
    public function showSubscriptionForm(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        // Only one business profile per user for listing.
        $listing = $user->listings()->firstOrFail();
        // Check if user is already subscribed.
        $existingSubscription = $listing->subscription()->first();

        if ($existingSubscription) {

            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription already exist.');
        }

        try {
            // Validate the request data
            $request->validate([
                'amount'   => 'required|numeric|min:1',
                'interval' => 'required|in:month,year,day',
                //  'payment_method_id' => 'required|string', // Payment method ID from the frontend
            ]);
            $interval = $request->input('interval');
            $productId = $this->paymentService->getProductIdByIntervalRequest($interval);
            $priceId = $this->paymentService->getPriceId($productId, $interval);

            $checkoutSession = $this->paymentService->checkoutSession(
                $user->id,
                $listing->id,
                $interval,
                $priceId,
                route('subscription.callback')
            );

            return view('subscription.form', compact('listing', 'checkoutSession'));
        } catch (Exception $e) {
            Log::error('Subscription creation failed: ' . $e->getMessage());

            return redirect()->route('listing.step.subscription', $listing)
                ->with('error', 'Subscription creation failed.');
        }
    }

    public function sessionStatus(Request $request): JsonResponse
    {
        try {
            // Retrieve the session ID from the request
            $sessionId = $request->input('session_id');

            // Call the service method to get session status
            $status = $this->paymentService->getSessionStatus($sessionId);

            // Respond with the session status and customer email
            return response()->json($status, ResponseAlias::HTTP_OK);
        } catch (\Exception $e) {
            // Respond with an error message
            return response()->json(['error' => $e->getMessage()], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function processCallback()
    {
        $sessionStatusUrl = route('subscription.session.status');

        return view('subscription.return', compact('sessionStatusUrl'));
    }
}
