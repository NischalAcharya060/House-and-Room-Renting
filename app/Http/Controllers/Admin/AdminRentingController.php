<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class AdminRentingController extends Controller
{
    public function index()
    {
        // Retrieve all rental records
        $rentals = Rental::with('property', 'user')->paginate(5);

        // Pass rental data to the view
        return view('admin.renting.index', compact('rentals'));
    }
}
