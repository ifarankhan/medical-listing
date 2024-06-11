<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryDropDown
{
    public function getServiceCategories(): Collection
    {
        return Category::all();
    }
}
