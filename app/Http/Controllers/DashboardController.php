<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): Factory|View|Application
    {
        // Get the authenticated user
        $user = Auth::user();
        // Load the user's roles
        $user->load('userRole');
        // Access user information
        $userName = $user->name;
        // Access user roles
        $userRoles = $user->userRole->first()->title;

        $numberOfProductServicesInListing = $this->getNumberOfProductServicesInList($user);
        $customerLeads = $this->getCustomerMessagesForListing($user);
        $listing = $this->getProductServicesInListing($user);
        // Each listing must have one product/service
        $listing = $listing->first();

        return view('dashboard', compact(
            'user',
            'numberOfProductServicesInListing',
            'customerLeads',
            'listing',
        ));
    }

    private function getNumberOfProductServicesInList($user)
    {
        /**
         * product_service_count: This is the automatically
         * generated attribute by withCount('productService').
         * It stores the count of productService relationships for each listing.
         */
        return $user->listings()
            ->withCount('productService')
            ->get()
            ->sum('product_service_count');
    }

    private function getCustomerMessagesForListing($user)
    {
        return $user->listings->sum(function ($listing) {
            return $listing->getCustomerLeadsCount();
        });
    }

    private function getProductServicesInListing($user)
    {
        return $user->listings()
            ->with('productService')
            ->get();
    }
}
