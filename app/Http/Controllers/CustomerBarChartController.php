<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerBarChartController extends Controller
{
    public function index(): JsonResponse
    {
        $chartData = [];
        // Get Messages per month for Logged-in User with Insurance Provider role.
        $user = Auth::user();
        $messagesPerMonth = $user->messages()
             ->select(
                 DB::raw('MONTH(created_at) as month'),
                 DB::raw('COUNT(*) as message_count')
             )->groupBy(DB::raw('MONTH(created_at)'))
             ->get();
        // Format the result to return all 12 months, even if some months have no messages.
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = [
                'month' => $i,
                'message_count' => $messagesPerMonth->firstWhere('month', $i)->message_count ?? 0
            ];
        }

        return response()->json($chartData);
    }
}
