<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function checkAuth(): JsonResponse
    {
        return response()->json(['authenticated' => Auth::check()]);
    }
}
