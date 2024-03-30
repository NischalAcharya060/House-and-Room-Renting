<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('user.Profile.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update user's name and email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update user's password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
}
