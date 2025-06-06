<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('about')->with(['meta' => [
            'og:title' => 'Providers/Businesses'
        ]]);
    }
}
