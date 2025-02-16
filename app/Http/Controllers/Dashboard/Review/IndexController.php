<?php

namespace App\Http\Controllers\Dashboard\Review;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function execute(): Factory|View|Application
    {
        $user = auth()->user();
        $reviews = null;
        $listing = $user->listings()
            ->with('reviews.customer')
            ->first();

        if ($listing) {
            $reviews = $listing->reviews()
                ->latest()
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }
        // Return a view having reviews grid.
        return view('dashboard.reviews.grid', compact(
            'user',
            'reviews',
        ));
    }
}
