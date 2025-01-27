<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingRequest;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ProductService;
use App\Models\State;
use App\Models\Subscription;
use App\Rules\WordCount;
use App\Services\CategoryDropDown;
use App\Services\FileUploadService;
use App\Services\PaymentService;
use App\Services\PhoneService;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Nette\Schema\ValidationException;
use Stripe\Exception\ApiErrorException;

class ListingController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService,
        protected Subscription $subscription,
        protected FileUploadService $fileUploadService,
        protected PhoneService $phoneService,
        protected CategoryDropDown $serviceCategory
    ) {
    }

    protected function getProductServiceCategories(): Collection
    {
        return $this->serviceCategory->getServiceCategories();
    }
    public function index(): Factory|View|Application
    {
        $currentUser = Auth::user();
        $hasListing  = $currentUser->listings()
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
        $categories = $this->getProductServiceCategories();
        $listing    = new Listing();
        $states     = State::all()->pluck('name', 'id')->toArray();

        return view('listing.create', compact('listing', 'categories', 'states'));
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
        $categories = $this->getProductServiceCategories();
        $states     = State::all()->pluck('name', 'id')->toArray();
        $listing->with(['productService', 'productService.category', 'details']);

        return view('listing.create', compact('listing', 'categories', 'states'));
    }

    /**
     * @throws Exception
     */
    private function uploadAndSaveProfilePicture($image, ?Listing $listing): void
    {
        if (is_null($image)) {
            return;
        }
        // Check if the listing already has a profile picture.
        if ($listing->profile_picture) {
            // Delete the old profile picture from the directory.
            $oldFilePath = public_path($listing->profile_picture);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }
        // Return the saved image path.
        $listing->profile_picture = $this->fileUploadService->uploadFile(
            $image,
            "listings/$listing->id/profile_picture",
            maxWidth: 880,
            maxHeight: 500,
            maxSize: 4096
        );

        $listing->save();
    }

    /**
     * @throws Exception
     */
    private function uploadAndSaveLegalProof($file, ?Listing $listing): void
    {
        if (is_null($file)) {
            return;
        }
        $details = $listing->getDetailsMapAttribute();
        // Check if the listing already has a profile picture.
        if (isset($details['legal_proof'])) {
            // Delete the old profile picture from the directory.
            $oldFilePath = public_path($details['legal_proof']);
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }
        }
        // Return the saved image path.
        $path = $this->fileUploadService->uploadFile($file, "listings/$listing->id/legal_proof");
        $listing->details()->create([
            'key'   => 'legal_proof',
            'value' => $path,
        ]);
    }

    /**
     * Store a newly created listing in storage.
     *
     * @param ListingRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ListingRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $listingId     = $request->get('listing_id') ?? null;

        try {
            // Create a new listing instance and save the data
            if ($listingId) {
                $listing = Listing::findOrFail($listingId);
                $this->updateListing($listing, $validatedData);
                $message = 'Listing updated successfully.';
            } else {
                // Check if the user already has a listing.
                if (auth()->check() && auth()->user()->listings) {
                    return redirect()->back()->with('error', 'You can only create one listing.');
                }
                $listing = $this->createListing($validatedData);
                $message = 'Listing created successfully.';
            }
            // Save product/services associated with the listing.
            $this->saveProductServices($listing, $validatedData['products']);
            // Save details associated with the listing.
            $this->saveListingDetails($listing, $validatedData);
            // Handle profile picture upload separately.
            $this->uploadAndSaveProfilePicture($request->file('profile_picture'), $listing);
            // Handle legal proof document upload separately.
            $this->uploadAndSaveLegalProof($request->file('legal_proof'), $listing);

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
            return redirect()->back()
                 ->withErrors($exception->errors()) // Use validation errors
                 ->withInput();
        } catch (Exception $e) {
            return redirect()->back()
                 ->withErrors(['error' => 'An unexpected error occurred: ' . $e->getMessage()])
                 ->withInput();
        }
    }

    private function updateListing(Listing $listing, array $data): void
    {
        $data['contact_number']   = $this->phoneService->unformatPhoneNumber($data['contact_number']);
        $data['business_contact'] = $this->phoneService->unformatPhoneNumber($data['business_contact']);
        $listing->update($data);
        $listing->productService()->delete();
        // Keep legal proof data as it is handled separately.
        $listing->details()
                ->whereNotIn('key', ['legal_proof'])
                ->delete();
    }

    public function validateListing(ListingRequest $request): JsonResponse
    {
        return response()->json(['success' => true]);
    }

    /**
     * @throws Exception
     */
    private function createListing(array $data): Listing
    {
        $listing                 = new Listing();
        $listing->user_id        = Auth::id();
        $listing->authorized     = $data['authorized'];
        $listing->registered     = $data['registered'];
        $listing->first_name     = $data['first_name'];
        $listing->last_name      = $data['last_name'];
        $listing->email          = $data['email'];
        $listing->contact_number = $this->phoneService->unformatPhoneNumber($data['contact_number']);
        //$listing->address = $data['address'];
        $listing->business_name    = $data['business_name'];
        $listing->slug             = $data['slug'];
        $listing->ein              = $data['ein'];
        $listing->business_address = $data['business_address'];
        $listing->business_zipcode = $data['business_zipcode'];
        $listing->business_city    = $data['business_city'];
        /*// Extract the ZIP code using a regex pattern for US ZIP codes.
        $zipCodePattern = '/\b\d{5}(?:-\d{4})?\b/';
        preg_match($zipCodePattern, $data['business_address'], $matches);

        // If a ZIP code is found, store it, else handle the absence.
        $listing->business_zipcode = !empty($matches) ? $matches[0] : null;*/

        $listing->business_contact = $this->phoneService->unformatPhoneNumber($data['business_contact']);
        $listing->business_email   = $data['business_email'];

        $listing->save();

        $this->saveListingDetails($listing, $data);

        return $listing;
    }

    private function saveProductServices(Listing $listing, array $products): void
    {
        foreach ($products as $product) {
            $productService = new ProductService([
                'listing_id'        => $listing->id,
                'category_id'       => $product['category_id'],
                'description'       => $product['description'],
                'virtual'           => $product['virtual'] ?? false,
                'in_person'         => $product['in_person'] ?? false,
                'accept_insurance'  => $product['accept_insurance'] ?? false,
                'insurance_list'    => $product['insurance_list'] ?? '',
                'price'             => $product['price'],
                'accepting_clients' => $product['accepting_clients'],
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
                Log::info(
                    'Listing ID: ' . $listingId . ' Subscription: ' . $subscriptionModel->stripe_subscription_id . ' Deleted'
                );
            }

            $this->deleteListing($listing);

            // Step 4: Redirect with success message
            return redirect()->route('listing.index')
                             ->with(
                                 'success',
                                 'Listing deletion is in process. You will be notified once the cancellation is confirmed.'
                             );
        } catch (ApiErrorException $e) {
            Log::error('Stripe API error for listing ID ' . $listingId . ': ' . $e->getMessage());

            return redirect()->route('listing.index')
                             ->with('error', 'Stripe API error: ' . $e->getMessage());
        } catch (Exception $exception) {
            Log::error('Error deleting listing ID ' . $listingId . ': ' . $exception->getMessage());

            return redirect()->route('listing.index')
                             ->with('error', 'An error occurred while deleting the listing.');
        }
    }

    /**
     * @param Listing $listing
     *
     * @return void
     */
    private function deleteListing(Listing $listing): void
    {
        if ($listing->user_id !== Auth::id()) {
            abort(403, 'Unauthorized'); // Or redirect to a different page
        }

        $listing->productService()->delete();
        $listing->delete();
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
        } catch (Exception $e) {
            // If there's an error, return a failure response
            return response()->json(['success' => false, 'message' => 'Failed to delete the product.'], 500);
        }
    }

    /**
     * @throws Exception
     */
    private function saveListingDetails(Listing $listing, array $data): void
    {
        $details = [
            'business_description' => $data['business_description'] ?? null,
            'business_states'      => ! empty($data['business_states']) ? json_encode($data['business_states']) : null,
            'social_media_1'       => $data['social_media_1'] ?? null,
            'social_media_2'       => $data['social_media_2'] ?? null,
            'social_media_3'       => $data['social_media_3'] ?? null,
            'social_media_4'       => $data['social_media_4'] ?? null,
        ];
        // Filter out null or empty values
        $filteredDetails = array_filter($details, function ($value) {
            return ! is_null($value) && $value !== '';
        });

        foreach ($filteredDetails as $key => $detail) {
            // Save in Listing details.
            $listing->details()->create([
                'key'   => $key,
                'value' => $detail,
            ]);
        }
    }
}
