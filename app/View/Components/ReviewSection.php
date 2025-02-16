<?php

namespace App\View\Components;

use App\Models\Review;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ReviewSection extends Component
{
    public ?Authenticatable $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public readonly Collection|LengthAwarePaginator $reviews,
        public readonly bool $showCount = true,
        public readonly bool $onlyRecent = false,
        public readonly int $entries = 3,
    )
    {
        $this->user = Auth::user();
    }

    private function getReviews(): Collection|LengthAwarePaginator
    {
        // Need to make it more flexible to handle pagination in component.
        return $this->reviews;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        if ($this->getReviews()->isNotEmpty()) {
            return view('components.review-section', [
                'user' => $this->user,
                'reviews' => $this->getReviews(),
            ]);
        }
    }
}
