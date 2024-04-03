<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;


class UserPropertyController extends Controller
{
    public function index()
    {
        // Get all properties
        $properties = Property::all();

        return view('user.property.index', ['properties' => $properties]);
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('user.property.show', compact('property'));
    }

    public function rent(Property $property, Request $request)
    {
        try {
            // Check if the property is available for rent
            if ($property->status === 'available') {
                \DB::beginTransaction();

                $property->status = 'rented';
                $property->save();

                // Create a new rental record with the specified rental duration
                Rental::create([
                    'property_id' => $property->id,
                    'user_id' => Auth::id(),
                    'rental_duration' => $request->input('rental_duration'), // Get rental duration input from the form
                ]);

                \DB::commit();

                return redirect()->route('user.properties.index')->with('success', 'Property rented successfully.');
            } else {
                return redirect()->route('user.properties.index')->with('error', 'This property is already rented.');
            }
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->route('user.properties.index')->with('error', 'An error occurred while renting the property.');
        }
    }

}
