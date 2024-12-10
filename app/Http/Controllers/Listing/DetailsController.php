<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function index(Listing $listing)
    {
        $listing->with(['productService', 'productService.category', 'details']);
        return view('listing.details', compact('listing'));
    }
}
