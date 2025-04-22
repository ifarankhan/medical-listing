<?php

namespace App\View\Components;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ReviewForm extends Component
{
    public bool $hasReviewed = false;
    public ?Authenticatable $user = null;

    /**
     * Create a new component instance.
     *
     * @param Listing $listing
     *
     * @return void
     */
    public function __construct(public readonly Listing $listing)
    {
        $this->user = Auth::user();

        if ($this->user && $this->user->isCustomer()) {
            $this->hasReviewed = $this->listing->reviews()
               ->where('customer_id', Auth::id())
               ->exists();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): Factory|View|Application
    {
        return view('components.review-form', [
            'showForm' => !$this->hasReviewed && $this->user && $this->user->isCustomer(),
        ]);
    }
}
