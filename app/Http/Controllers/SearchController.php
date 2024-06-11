<?php

namespace App\Http\Controllers;

use App\Services\CategoryDropDown;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected SearchService $searchService;
    protected CategoryDropDown $categoryDropDown;

    public function __construct(SearchService $searchService, CategoryDropDown $categoryDropDown)
    {
        $this->searchService = $searchService;
        $this->categoryDropDown = $categoryDropDown;
    }

    public function search(Request $request)
    {
        $serviceCategories = $this->categoryDropDown->getServiceCategories();
        $filters = $request->only(['category']);
        $listings = $this->searchService->search($filters);

        return view('search.index', compact('listings', 'serviceCategories'));
    }
}
