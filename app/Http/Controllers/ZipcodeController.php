<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ZipcodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $search = $request->get('q');
        // Fetch zip codes from the listings table based on search input
        $zipcodes = Listing::where('business_zipcode', 'LIKE', "%$search%")
           ->distinct() // Optional: To get distinct zip codes
           ->pluck('business_zipcode')
           ->map(function ($zipcode) {
               return ['id' => $zipcode, 'text' => $zipcode]; // Format for Select2
           });

        return response()->json($zipcodes);
    }
}
