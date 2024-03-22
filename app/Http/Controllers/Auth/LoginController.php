<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Check the user type and redirect accordingly
            if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'landlord') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->user_type == 'user') {
                return redirect()->route('user.dashboard');
            }
        }        

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            // Log or handle the exception
            return redirect()->route('login')->withErrors(['google' => 'Google authentication failed. Please try again.']);
        }

        if (!$user) {
            // Handle case where user object is null
            return redirect()->route('login')->withErrors(['google' => 'Google authentication failed. Please try again.']);
        }

        // Check if the user already exists in your database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            // Create a new user with Google credentials
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = bcrypt(Str::random(8));
            $newUser->save();

            Auth::login($newUser);
        }

        // Redirect user after login
        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'landlord') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->user_type == 'user') {
            return redirect()->route('user.dashboard');
        }

        // Default return statement in case none of the conditions are met
        return redirect()->route('user.dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Logout successful.');
    }
}