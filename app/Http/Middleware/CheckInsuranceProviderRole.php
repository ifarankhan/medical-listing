<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckInsuranceProviderRole
{
    /**
     * Handle an incoming request for listing or other routes.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     *
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();

        if (!$user->userRole->contains('name', 'insurance_provider')) {
            // Optionally, redirect to a specific route or show a 403 page
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
