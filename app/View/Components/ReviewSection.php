<?php

namespace App\View\Components;

use App\Models\Review;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
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
    public function __construct(public readonly Collection $reviews)
    {
        $this->user = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.review-section', [
            'user' => $this->user,
        ]);
    }
}
