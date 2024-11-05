<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoleType
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @param string ...$roles
     *
     * @return
     */
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        // Get the authenticated user
        $user = Auth::user();
        // Check if the user exists and has allowed role.
        if ($user->userRole()->whereIn('name', $roles)->exists()) {
            return $next($request);
        }
        // If the user doesn't have any of the specified role types, invalidate the session and redirect to logout
        Auth::logout();
        return redirect()->route('login')
           ->with('error', 'You are not authorized to access this resource.');
    }
}
