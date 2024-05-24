<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return view('user.dashboard', compact('properties'));
    }

}
