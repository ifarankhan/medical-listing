<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(): Application|Factory|View|RedirectResponse
    {
        // Get the authenticated user
        $user = Auth::user();
        if ($user->isCustomer()) {
            // For now customer gets to redirect to message instead of dashboard.
            return redirect()->route('message');
        }
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
        $loadBarChart = true;

        $listingReviewCount = $this->getServiceProviderListingReviewCount($listing);

        return view('dashboard', compact(
            'user',
            'numberOfProductServicesInListing',
            'customerLeads',
            'listing',
            'loadBarChart',
            'listingReviewCount',
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


    private function getCustomerMessagesForListing($user): int
    {
        /** @var Listing $listing */
        $listing = $user->listings;
        // A listing can have many messages.
        return $listing ? $listing->getCustomerLeadsCount(): 0;
    }

    /**
     * @param $user
     *
     * @return Collection
     */
    private function getProductServicesInListing($user): Collection
    {
        return $user->listings()
            ->with('productService')
            ->get();
    }

    private function getServiceProviderListingReviewCount(?Listing $listing): int
    {
        if (is_null($listing)) {
            return 0;
        }

        return $listing->reviews()
            ->count();
    }
}
