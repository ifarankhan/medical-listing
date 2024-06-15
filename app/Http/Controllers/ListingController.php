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
use Nette\Schema\ValidationException;

class ListingController extends Controller
{
    const STATUS_PAID = 'paid';
    const STATUS_PENDING = 'pending';

    public function index(): Factory|View|Application
    {
        $currentUser = Auth::user();
        $listings = $currentUser->listings()->get();

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
     * @param Listing $listing
     *
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Listing $listing): Factory|View|Application|RedirectResponse
    {
        if ($listing->user_id !== Auth::id()) {
            abort(403, 'Unauthorized'); // Or redirect to a different page
        }
        $categories = Category::all();
        $listing->with(['productService', 'productService.category']);

        return view('listing.create', compact('listing', 'categories'));
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
        try {
            // Validate the request data
            $validatedData = $this->validateListingData($request);
            $listingId = $request->input('listing_id');
            // Create a new listing instance and save the data
            if ($listingId) {

                $listing = Listing::findOrFail($listingId);
                $this->updateListing($listing, $validatedData);
                $message = 'Listing updated successfully.';
            } else {

                $listing = $this->createListing($validatedData);
                $message = 'Listing created successfully. Please choose the plan.';
            }
            // Save product/services associated with the listing.
            $this->saveProductServices($listing, $validatedData['products']);

            return redirect()->route('listing.step.subscription', $listing)
                             ->with('success', $message);
        } catch (ValidationException $exception) {
            // If validation fails, redirect back with validation errors
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }
    }
    private function updateListing(Listing $listing, array $data): void
    {
        $listing->update($data);
        $listing->productService()->delete();
    }
    /**
     * @param Request $request
     *
     * @return array
     */
    private function validateListingData(Request $request): array
    {
        return $request->validate([
            'authorized' => 'required|boolean',
            'registered' => 'required|boolean',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'business_name' => 'required|string',
            'ein' => 'required|regex:/^\d{2}-\d{7}$/',
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
    }
    private function createListing(array $data): Listing
    {
        $listing = new Listing();
        $listing->user_id = Auth::id();
        $listing->authorized = $data['authorized'];
        $listing->registered = $data['registered'];
        $listing->first_name = $data['first_name'];
        $listing->last_name = $data['last_name'];
        $listing->email = $data['email'];
        $listing->contact_number = $data['contact_number'];
        $listing->address = $data['address'];
        $listing->business_name = $data['business_name'];
        $listing->ein = $data['ein'];
        $listing->business_address = $data['business_address'];
        $listing->business_contact = $data['business_contact'];
        $listing->business_email = $data['business_email'];

        $listing->save();

        return $listing;
    }
    private function saveProductServices(Listing $listing, array $products): void
    {
        foreach ($products as $product) {
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
    }

    /**
     * @param Listing $listing
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function subscription(Listing $listing): Factory|View|Application|RedirectResponse
    {
        if ($listing->user_id !== Auth::id()) {
            abort(403, 'Unauthorized'); // Or redirect to a different page
        }

        return view('listing.subscription', compact('listing'));
    }

    public function delete(Listing $listing): RedirectResponse
    {
        $delete = $this->deleteListing($listing);

        if (!$delete) {
            return redirect()->route('listing.index')
                ->with('error', 'Listing with id ${$listingId} not found.');
        }

        return redirect()->route('listing.index')
            ->with('success', 'Listing deleted successfully.');
    }

    /**
     * @param Listing $listing
     *
     * @return bool
     */
    private function deleteListing(Listing $listing): bool
    {
        if ($listing->user_id !== Auth::id()) {
            abort(403, 'Unauthorized'); // Or redirect to a different page
        }

        $listing->productService()->delete();
        $listing->delete();

        return true;
    }
}
