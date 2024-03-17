<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB; 
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    
     public function create()
    {
        return view('admin.users.create');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'user_type' => 'required',
    ]);

    try {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_type = $request->user_type;
        $user->save();

        return redirect()->route('admin.user.management')->with('success', 'User created successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to create user: ' . $e->getMessage());
    }
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:6',
        'user_type' => 'required',
    ]);

    try {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user_type');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin.user.management')->with('success', 'User updated successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
    }
}


    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.management')->with('success', 'User deleted successfully');
    }
}
