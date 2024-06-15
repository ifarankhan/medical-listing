<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(): Factory|View|Application
    {
        // Don't show Admin role for front end.
        $userRoles = UserRole::all()->where('name', '!=', UserRole::ROLE_ADMIN);

        return view('register', ['userRoles' => $userRoles]);
    }

    public function registerPost(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
            'role' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email address has already been taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 5 characters long',
            'password.confirmed' => 'Password confirmation does not match',
            'role.required' => 'Role is required',
        ]);
        try {
            DB::beginTransaction();

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();
            // Fetch the role ID from the request
            $roleId = $request->input('role');
            // Attach the role to the user
            $user->userRole()->attach($roleId);

            DB::commit();
            return back()->with('success', 'User registered successfully');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', 'Registration failed. Please try again.');
        }
    }
}
