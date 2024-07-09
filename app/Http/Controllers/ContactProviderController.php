<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactProviderController extends Controller
{
    public function __construct(public Listing $listing)
    {
        $this->middleware('auth'); // Apply auth middleware to the entire controller.
        $this->middleware('role:customer')
             ->only('contactMultiple'); // Apply role middleware only to contactMultiple method
    }
    public function contactMultiple(Request $request): JsonResponse
    {
        // Retrieve the referring URL (search page URL)
        $refererUrl = $request->headers->get('referer');
        // Store the referring URL in session
        session()->put('referer_url', $refererUrl);

        /** @var User $user Retrieve the authenticated user. */
        $user = Auth::user();

        // Check if user is logged in
        if (!$user) {

            redirect()->route('login');
        }
        // Check if the user has the 'customer' role
        if (!$user->isCustomer()) {

            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($request->post('contactRequested') != 'false') {
            // Review request will be without message text field.
            session()->put('contactRequested', $request->post('contactRequested'));
        }
        // Retrieve the selected values from the request
        $selectedListingIds = $request->input('selectedValues');
        // Store selected values in the session
        session(['selectedValues' => $selectedListingIds]);

        return response()->json(['error' => false]);
    }

    public function reviewRequest()
    {
        $listings = [];
        $listingIds = [];
        $contactRequested = session()->has('contactRequested') == 'true';
        // Check if session variable is set
        if (session()->has('selectedValues')) {

            $listings = $this->prepareListingArray(session('selectedValues'));
            $listingIds = array_values(session('selectedValues'));
        }

        return view('contact-provider.review-request', compact(
            'listings',
            'listingIds',
            'contactRequested'
        ));
    }

    private function prepareListingArray(array $listingIds): array
    {
        $listings = [];

        foreach ($listingIds as $listingId) {

            $listing    = $this->listing->find($listingId);

            if ($listing) {
                $listings[] = $listing;
            }
        }

        return $listings;
    }
}
