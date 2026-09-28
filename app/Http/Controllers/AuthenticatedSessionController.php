<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REGISTER PAGE
    |--------------------------------------------------------------------------
    */

    public function create(): View
    {
        return view('auth.register');
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTER USER
    |--------------------------------------------------------------------------
    */

    public function store(Request $request): RedirectResponse
    {
        // Validate registration
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | FIRST ACCOUNT = ADMIN
        | NEXT ACCOUNTS = USER
        |--------------------------------------------------------------------------
        */

        // Check whether this is the first account
        $isFirstUser = User::count() === 0;

        // First account will be admin
        // All next accounts will be normal users
        $role = $isFirstUser ? 'admin' : 'student';


        /*
        |--------------------------------------------------------------------------
        | CREATE ACCOUNT
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);


        // Registration event
        event(new Registered($user));


        /*
        |--------------------------------------------------------------------------
        | IMPORTANT
        |--------------------------------------------------------------------------
        |
        | User ko automatically login nahi karna.
        | Registration ke baad Login page open hoga.
        |
        */

        if ($role === 'admin') {
            return redirect()
                ->route('login')
                ->with(
                    'status',
                    'Admin account created successfully! Please login to continue.'
                );
        }

        return redirect()
            ->route('login')
            ->with(
                'status',
                'Account created successfully! Please login to continue.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function login(): View
    {
        return view('auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN USER
    |--------------------------------------------------------------------------
    */

    public function loginUser(LoginRequest $request): RedirectResponse
    {
        // Check email and password
        $request->authenticate();

        // Regenerate session for security
        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | ADMIN LOGIN
        |--------------------------------------------------------------------------
        */

        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard');
        }



        /*
        |--------------------------------------------------------------------------
        | NORMAL USER LOGIN
        |--------------------------------------------------------------------------
        */

        return redirect()->route('dashboard');
    }


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request): RedirectResponse
    {
        // Logout user
        Auth::guard('web')->logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Go back to Home
        return redirect()->route('home');
    }
}