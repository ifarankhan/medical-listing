<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index($slug): Factory|View|Application
    {
        $listing = Listing::with([
            'productService',
            'productService.category',
            'details',
        ])->where('slug', $slug)
          ->firstOrFail(); // Fails if listing not found.

        $reviews = $listing->reviews()
            ->with('customer')
            ->latest()
            ->paginate(3);

        $businessDescription = (trim($listing->getDetail('business_description')) !== '<p><br></p>')
                               ? $listing->getDetail('business_description'): '';
        $businessImage = asset('storage/' . $listing->profile_picture) ?? null;

        return view('listing.details', compact(
            'listing',
            'businessDescription',
            'reviews'
        ))->with(['meta' => [
            'og:title' => $listing->business_name,
            'og:description' => $businessDescription ? strip_tags($businessDescription) : null,
            'og:image' => $businessImage,
        ]]);
    }
}
