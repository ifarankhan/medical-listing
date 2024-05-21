<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListingController extends Controller
{
    public function index(): Factory|View|Application
    {
        $listings = Listing::all();

        return view('listings.index', compact('listings'));
    }
    /**
     * Show the form for creating a new listing.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('listings.create');
    }

    /**
     * Store a newly created listing in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'authorized' => 'required|in:yes,no',
            'registered' => 'required|in:yes,no',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'ein' => 'required|string|max:20',
            'business_address' => 'required|string|max:255',
            'business_contact' => 'required|string|max:20',
            'business_email' => 'required|email|max:255',
            'product_service_1' => 'required|string|max:255',
            'options_1' => 'nullable|array',
            'description_1' => 'required|string|max:150',
            'accept_insurance_1' => 'required|in:yes,no',
            'insurance_1' => 'nullable|string|max:255',
            'price_1' => 'nullable|string|max:20',
            // Add validation rules for additional products/services dynamically if necessary
        ]);

        // Create a new listing instance and save the data
        $listing = new Listing();
        $listing->authorized = $validatedData['authorized'];
        $listing->registered = $validatedData['registered'];
        $listing->first_name = $validatedData['first_name'];
        $listing->last_name = $validatedData['last_name'];
        $listing->email = $validatedData['email'];
        $listing->contact_number = $validatedData['contact_number'];
        $listing->address = $validatedData['address'];
        $listing->business_name = $validatedData['business_name'];
        $listing->ein = $validatedData['ein'];
        $listing->business_address = $validatedData['business_address'];
        $listing->business_contact = $validatedData['business_contact'];
        $listing->business_email = $validatedData['business_email'];
        $listing->product_service_1 = $validatedData['product_service_1'];
        $listing->options_1 = implode(',', $validatedData['options_1'] ?? []);
        $listing->description_1 = $validatedData['description_1'];
        $listing->accept_insurance_1 = $validatedData['accept_insurance_1'];
        $listing->insurance_1 = $validatedData['insurance_1'] ?? null;
        $listing->price_1 = $validatedData['price_1'] ?? null;

        // Save additional products/services if necessary

        $listing->save();

        return redirect()->route('listings.index')->with('success', 'Listing created successfully.');
    }
}
