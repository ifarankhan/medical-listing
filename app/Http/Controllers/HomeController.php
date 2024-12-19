<?php

namespace App\Http\Controllers;

use App\Services\CategoryDropDown;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected CategoryDropDown $categoryDropDown;
    public function __construct(CategoryDropDown $categoryDropDown)
    {
        $this->categoryDropDown = $categoryDropDown;
    }

    public function index(): Factory|View|Application
    {
        $serviceCategories = $this->categoryDropDown->getServiceCategories();

        return view('home', compact('serviceCategories'))->with(['meta' => [
            'og:title' => 'Home'
        ]]);
    }
}
