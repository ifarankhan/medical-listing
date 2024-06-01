<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\ProductService;
use App\Rules\WordCount;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ListingController extends Controller
{
    const STATUS_PAID = 'paid';

    public function index(): Factory|View|Application
    {
        $listings = Listing::all();

        return view('listing.index', compact('listings'));
    }
    /**
     * Show the form for creating a new listing.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        $categories = Category::all();
        return view('listing.create', compact('categories'));
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
            'authorized' => 'required|boolean',
            'registered' => 'required|boolean',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'business_name' => 'required|string',
            'ein' => 'required|string',
            'business_address' => 'required|string',
            'business_contact' => 'required|string',
            'business_email' => 'required|email',
            // Validation rules for product/services - upto 5
            'products' => 'required|array|max:5', // Maximum 5 products allowed
            'products.*.category_id' => 'required|exists:categories,id', // Ensure category_id is required and exists.
            'products.*.description' => ['required', 'string', new WordCount(150)], // Validate each product description
            'products.*.virtual' => 'nullable|boolean', // Validate each product virtual attribute
            'products.*.in_person' => 'nullable|boolean', // Validate each product in_person attribute
            'products.*.accept_insurance' => 'nullable|boolean', // Validate each product accept_insurance attribute
            'products.*.insurance_list' => 'nullable|string', // Validate each product insurance_list attribute
            'products.*.price' => 'nullable|numeric|min:0', // Validate each product price
        ]);
        // Create a new listing instance and save the data
        $listing = new Listing();
        $listing->user_id = Auth::id();
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
        $listing->save();
        // Save product/services associated with the listing.
        foreach ($request->input('products') as $product) {

            $productService = new ProductService([
                'listing_id' => $listing->id,
                'category_id' => $product['category_id'],
                'description' => $product['description'],
                'virtual' => $product['virtual'] ?? false,
                'in_person' => $product['in_person'] ?? false,
                'accept_insurance' => $product['accept_insurance'] ?? false,
                'insurance_list' => $product['insurance_list'] ?? '',
                'price' => $product['price'],
            ]);

            $productService->save();
        }

        return redirect()->route('listing.step.subscription', ['id' => $listing->id])
            ->with('success', 'Listing created successfully. Please choose the plan.');
    }

    public function subscription(int $listingId)
    {
        $currentUser = Auth::user();
        $listing = $currentUser->listings()
            ->find($listingId);

        if (!$listing) {
            return response()
                ->json(['message' => 'Listing not found'], 404);
        }

        return $this->showStep(2);
    }

    public function showStep(int $step)
    {
        if ($step == 1) {
            return view('listing.information');
        } elseif ($step == 2) {
            return view('listing.subscription');
        }
    }
}
