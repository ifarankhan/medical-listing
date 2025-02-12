<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StarRating extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public readonly float $rating = 0.0,
        public readonly bool $isListingsPage = false,
    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): Factory|View|Application
    {
        return view('components.star-rating');
    }
}
