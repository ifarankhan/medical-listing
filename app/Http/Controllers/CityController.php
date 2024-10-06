<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
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
        $zipcodes = Listing::where('business_city', 'LIKE', "%$search%")
           ->distinct() // Optional: To get distinct zip codes
           ->pluck('business_city')
           ->map(function ($zipcode) {
               return ['id' => $zipcode, 'text' => $zipcode]; // Format for Select2
           });

        return response()->json($zipcodes);
    }
}
