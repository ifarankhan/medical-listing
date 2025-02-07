<?php

namespace App\Http\Controllers;

use App\Services\CategoryDropDown;
use App\Services\StatesCountriesService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        protected CategoryDropDown $categoryDropDown,
        protected StatesCountriesService $statesCountriesService
    )
    {}

    public function index(): Factory|View|Application
    {
        $serviceCategories = $this->categoryDropDown->getServiceCategories();
        $businessStatesCountries = $this->statesCountriesService->getStatesCountries();

        return view('home', compact(
            'serviceCategories',
            'businessStatesCountries'
        ))->with(['meta' => [
            'og:title' => 'Home'
        ]]);
    }
}
