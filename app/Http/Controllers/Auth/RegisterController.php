<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterUserMail;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(): Factory|View|Application
    {
        // Don't show Admin role for front end.
        $userRoles = UserRole::all()->where('name', '!=', UserRole::ROLE_ADMIN);

        return view('register', ['userRoles' => $userRoles])->with(['meta' => [
            'og:title' => 'Register'
        ]]);
    }

    public function registerPost(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',      // Must contain at least one uppercase letter
                'regex:/[a-z]/',      // Must contain at least one lowercase letter
                'regex:/[0-9]/',      // Must contain at least one number
                'regex:/[@$!%*?&]/',  // Must contain a special character
                'required_with:password_confirmation',
                'same:password_confirmation'
            ],
            'password_confirmation' => 'min:8',
            'role' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email address has already been taken.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must be at least 8 character long and contain at least one uppercase letter,
            one number and one special character.',
            'password.confirmed' => 'Password confirmation does not match',
            'role.required' => 'Role is required',
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
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
            Mail::to($user->email)->send(new RegisterUserMail($user));

            DB::commit();
            return back()->with('success', 'User registered successfully');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', 'Registration failed. Please try again.');
        }
    }
}
