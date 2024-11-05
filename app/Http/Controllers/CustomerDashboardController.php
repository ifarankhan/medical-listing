<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        if ($user->isServiceProvider()) {
            // For now customer gets to redirect to message instead of dashboard.
            abort(404);
        }

        $messageSent = $this->getUnreadMessageSentCount($user);
        $queriesSent = $this->getQueriesSentCount($user);
        $loadCustomerBarChart = true;
        return view('customer-dashboard', compact(
            'user',
            'messageSent',
            'queriesSent',
            //'listing',
            'loadCustomerBarChart'
        ));
    }

    private function getUnreadMessageSentCount($user)
    {
        // Get all new messages received by service provider against query.
        // Get all messages by provider id against user id with status 'unread'.
        return $user->messages()
            ->where('status', 'unread')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
    }

    private function getQueriesSentCount($user)
    {
        return $user->messages()->count();
    }
}
