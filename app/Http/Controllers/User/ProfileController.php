<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user's name and email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update user's password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Handle profile picture update if provided
        if ($request->hasFile('profile_picture')) {
            // Delete the previous profile picture if it exists
            if ($user->profile_picture) {
                Storage::delete('public/profile_pictures/' . $user->profile_picture);
            }

            // Store the new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = basename($profilePicturePath);
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
}
