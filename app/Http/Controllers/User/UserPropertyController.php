<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;


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

    public function rent(Property $property)
    {
        try {
            // Check if the property is available for rent
            if ($property->status === 'available') {
                // Update the status of the property to "rented"
                $property->status = 'rented';
                $property->save();

                // Redirect back to the properties page with a success message
                return redirect()->route('user.properties.index')->with('success', 'Property rented successfully.');
            } else {
                // Redirect back to the properties page with an error message if the property is not available for rent
                return redirect()->route('user.properties.index')->with('error', 'This property is not available for rent or already rented.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during the rental process
            return redirect()->route('user.properties.index')->with('error', 'An error occurred while renting the property.');
        }
    }

}
