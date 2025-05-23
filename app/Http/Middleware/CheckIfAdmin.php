<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\SessionGuard;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckIfAdmin
{
    /**
     * Checked that the logged in user is an administrator.
     *
     * --------------
     * VERY IMPORTANT
     * --------------
     * If you have both regular users and admins inside the same table, change
     * the contents of this method to check that the logged in user
     * is an admin, and not a regular user.
     *
     * Additionally, in Laravel 7+, you should change app/Providers/RouteServiceProvider::HOME
     * which defines the route where a logged in user (but not admin) gets redirected
     * when trying to access an admin route. By default it's '/home' but Backpack
     * does not have a '/home' route, use something you've built for your users
     * (again - users, not admins).
     *
     * @param Authenticatable|User|null $user
     *
     * @return bool
     */
    private function checkIfUserIsAdmin(User|Authenticatable|null $user): bool
    {
        return !is_null($user) && $user->isAdmin();
    }

    /**
     * Answer to unauthorized access request.
     *
     * @param Request $request
     *
     * @return Response|RedirectResponse
     */
    private function respondToUnauthorizedRequest(Request $request): Response|RedirectResponse
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response(trans('backpack::base.unauthorized'), 401);
        } else {
            /** @var SessionGuard $backpackAuth */
            $backpackAuth = backpack_auth();
            // If the user is other than backpack, log out and then redirect now guest user back to login.
            $backpackAuth->logout();
            return redirect()->guest(backpack_url('login'))
                ->withErrors(['error' => trans('backpack::base.unauthorized')]);
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (backpack_auth()->guest()) {
            return $this->respondToUnauthorizedRequest($request);
        }

        if (!$this->checkIfUserIsAdmin(backpack_user())) {
            return $this->respondToUnauthorizedRequest($request);
        }

        return $next($request);
    }
}
