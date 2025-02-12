<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class RatingsOverview extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public readonly float $averageRating,
        public readonly int $totalReviews = 0,
        public readonly ?Collection $ratingsPercentage
    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.ratings-overview');
    }
}
