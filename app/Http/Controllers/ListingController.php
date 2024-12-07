<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\ProductService;
use App\Models\Subscription;
use App\Rules\WordCount;
use App\Services\PaymentService;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Nette\Schema\ValidationException;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\InvalidRequestException;

class ListingController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService,
        protected Subscription $subscription
    ){}
    public function index(): Factory|View|Application
    {
        $currentUser = Auth::user();
        $hasListing = $currentUser->listings()
            ->exists();
        // Show only listings that are paid for.
        $listings = $currentUser->listings()
            //->where('listing_status', self::STATUS_SUBSCRIBED)
            ->get();

        return view('listing.index', compact('listings', 'hasListing'));
    }
    /**
     * Show the form for creating a new listing.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        $categories = Category::all();
        $listing = new Listing();
        return view('listing.create', compact('listing', 'categories'));
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

    public function uploadProfilePicture($image, ?Listing $listing): string
    {
        // Get the original file name and create a unique name.
        $fileName = pathinfo(
            $image->getClientOriginalName(),
            PATHINFO_FILENAME
        ) . '_' . time() . '.' . $image->getClientOriginalExtension();

        // Define the directory
        $directory = storage_path('app/public/listings/profile_picture');

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true); // Create the directory with proper permissions.
        }

        // Resize the image using Intervention Image.
        $resizedImage = Image::read($image);

        // Resize the image to 410x280 and save it.
        $resizedImage->resize(410, 280)
            ->save($directory . '/' . $fileName);

        // Check if the listing already has a profile picture.
        if ($listing->profile_picture) {
            // Delete the old profile picture from the directory.
            $oldFilePath = public_path($listing->profile_picture);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }

        // Return the saved image path.
        return 'listings/profile_picture/' . $fileName;
    }

    /**
     * Store a newly created listing in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {

            $listingId = $request->input('listing_id');
            // Create a new listing instance and save the data
            if ($listingId) {
                // Validate the request data
                $validatedData = $this->validateListingData($request, true);
                $listing = Listing::findOrFail($listingId);
                $this->updateListing($listing, $validatedData);
                $message = 'Listing updated successfully.';
            } else {
                // Validate the request data
                $validatedData = $this->validateListingData($request);
                $listing = $this->createListing($validatedData);
                $message = 'Listing created successfully. Please choose the plan.';
            }
            // Check if an image is uploaded
            if ($request->hasFile('profile_picture')) {

                $listing->profile_picture = $this->uploadProfilePicture(
                    $request->file('profile_picture'),
                    $listing
                );

                $listing->save();
            }
            // Save product/services associated with the listing.
            $this->saveProductServices($listing, $validatedData['products']);

            if ($request->input('action') == 'save') {

                // Redirect back to the form with a success message.
                return redirect()
                    ->route('listing.edit', $listing->id)
                    ->with('success', 'The listing was updated successfully!');
            } else {

                return redirect()->route('listing.step.subscription', $listing)
                                 ->with('success', $message);
            }
        } catch (ValidationException $exception) {
            // If validation fails, redirect back with validation errors.
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
     * @param bool $isEdit
     *
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateListingData(Request $request, bool $isEdit = false): array
    {
        // Define validation rules
        $rules = [
            // Common rules
            'products' => 'required|array|max:5', // Maximum 5 products allowed.
            'products.*.category_id' => 'bail|required|exists:categories,id', // Using bail to stop after first failure.
            'products.*.description' => ['required', 'string', new WordCount(150)], // Validate each product description.
            'products.*.virtual' => 'nullable|boolean', // Validate each product virtual attribute.
            'products.*.in_person' => 'nullable|boolean', // Validate each product in_person attribute.
            'products.*.accept_insurance' => 'nullable|boolean', // Validate each product accept_insurance attribute.
            'products.*.insurance_list' => 'nullable|string', // Validate each product insurance_list attribute.
            'products.*.price' => 'nullable|numeric|min:0', // Validate each product price.
        ];

        // Add rules only for create action
        if (!$isEdit) {
            $rules = array_merge($rules, [
                'authorized' => 'required|boolean',
                'registered' => 'required|boolean',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'contact_number' => 'required|string',
                'address' => 'required|string',
                'business_name' => 'required|string',
                'ein' => 'nullable|regex:/^\d{2}-\d{7}$/',
                'business_address' => 'required|string',
                'business_city' => 'string',
                'business_zipcode' => 'string|regex:/^\d{5}(-\d{4})?$/',
                'business_contact' => 'required|string',
                'business_email' => 'required|email',
                'profile_picture' => 'mimes:jpeg,png,jpg|image|max:4096',
            ]);
        }

        // Validate the request data
        $validatedData = $request->validate($rules, [
            // Custom error messages.
            'products.*.category_id.required' => 'The Product/Service is required for each product.',
            'products.*.category_id.exists' => 'The selected Product/Service does not exist.',
            'profile_picture.mimes' => 'The profile picture must be a file of type: jpeg, png, jpg.',
            'profile_picture.image' => 'The profile picture must be an image.',
            'profile_picture.max' => 'The profile picture may not be greater than 4 MB.',
        ], [
            // Custom attributes for friendly error messages.
            'products.0.category_id' => 'Product/Service for Product 1',
            'products.1.category_id' => 'Product/Service for Product 2',
            'products.2.category_id' => 'Product/Service for Product 3',
            'products.3.category_id' => 'Product/Service for Product 4',
            'products.4.category_id' => 'Product/Service for Product 5',
        ]);

        // Check for duplicate category_ids
        $categoryIds = collect($validatedData['products'])->pluck('category_id');
        $duplicates = $categoryIds->duplicates()->unique();

        // If duplicates are found, throw a validation exception
        if ($duplicates->isNotEmpty()) {
            $duplicateCategoryIds = implode(', ', $duplicates->toArray());

            // Add a custom error message for duplicates
            throw \Illuminate\Validation\ValidationException::withMessages([
                'products' => ['Each product must have a unique Product/Service.'],
            ]);
        }

        return $validatedData;
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
        $listing->business_zipcode = $data['business_zipcode'];
        $listing->business_city = $data['business_city'];
        /*// Extract the ZIP code using a regex pattern for US ZIP codes.
        $zipCodePattern = '/\b\d{5}(?:-\d{4})?\b/';
        preg_match($zipCodePattern, $data['business_address'], $matches);

        // If a ZIP code is found, store it, else handle the absence.
        $listing->business_zipcode = !empty($matches) ? $matches[0] : null;*/

        $listing->business_contact = $data['business_contact'];
        $listing->business_email = $data['business_email'];
        $listing->profile_picture =

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
        $listingId = $listing->id;

        try {
            // Get the subscription associated with the listing.
            $subscriptionModel = $listing->subscription()->latest()->first();

            if ($subscriptionModel != null) {
                // Do not delete listing that is not 14 days or more, old.
                if ($subscriptionModel->status === Subscription::STATUS_ACTIVE) {
                    $createdDate = Carbon::parse($subscriptionModel->start_date); // Get the subscription creation date
                    // Check if the subscription is more than 14 days old.
                    if ($createdDate->diffInDays(Carbon::now()) > 14) {
                        return redirect()->route('listing.index')
                            ->with('error', 'Cannot delete listing that is more than 14 days old.');
                    }
                }
                // Step 1: Cancel the associated subscription in Stripe
                // This will trigger customer.subscription.deleted from stripe
                // And it's best to perform deletion and archiving there.
                // On charge.refund, the related payment is also gets refunded.
                $this->paymentService->cancel($listing);
                Log::info('Listing ID: '. $listingId .' Subscription: '. $subscriptionModel->stripe_subscription_id . ' Deleted');
            }

            $this->deleteListing($listing);
            // Step 4: Redirect with success message
            return redirect()->route('listing.index')
                ->with('success', 'Listing deletion is in process. You will be notified once the cancellation is confirmed.');
        } catch (ApiErrorException $e) {
            Log::error('Stripe API error for listing ID ' . $listingId . ': ' . $e->getMessage());

            return redirect()->route('listing.index')
                ->with('error', 'Stripe API error: ' . $e->getMessage());
        } catch (\Exception $exception) {
            Log::error('Error deleting listing ID ' . $listingId . ': ' . $exception->getMessage());

            return redirect()->route('listing.index')
                ->with('error', 'An error occurred while deleting the listing.');
        }
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

    public function deleteProductService($id): JsonResponse
    {
        try {
            // Find the product by ID
            $product = ProductService::findOrFail($id);
            // Delete the product
            $product->delete();
            // Return a success response
            return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
        } catch (\Exception $e) {
            // If there's an error, return a failure response
            return response()->json(['success' => false, 'message' => 'Failed to delete the product.'], 500);
        }
    }
}
