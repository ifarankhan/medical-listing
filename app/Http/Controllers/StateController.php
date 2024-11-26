<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StateController extends Controller
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
        $search = $request->input('search');
        $states = State::where('name', 'LIKE', "%{$search}%")
            ->paginate(10);

        return response()->json([
            'items' => $states->map(function ($state) {
                return ['id' => $state->id, 'text' => $state->name];
            }),
            'pagination' => [
                'more' => $states->hasMorePages()
            ]
        ]);
    }
}
