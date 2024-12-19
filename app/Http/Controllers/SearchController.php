<?php

namespace App\Http\Controllers;

use App\Services\CategoryDropDown;
use App\Services\SearchService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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

    public function search(Request $request): Factory|View|Application
    {
        $serviceCategories = $this->categoryDropDown->getServiceCategories();
        $filters = $request->only(array_keys($this->searchService->filters));
        $listings = $this->searchService->search($filters);
        $resultThreshold = SearchService::RESULT_THRESHOLD;

        return view('search.index', compact(
            'listings',
            'serviceCategories',
            'filters',
            'resultThreshold',
        ))->with(['meta' => [
            'og:title' => 'Search Result'
        ]]);
    }
}
