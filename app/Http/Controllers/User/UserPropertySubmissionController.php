<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class UserPropertySubmissionController extends Controller
{
    public function show()
    {
        return view('user.property_submission.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'location' => 'required',
                'map_coordinates' => 'nullable',
                'price' => 'required|numeric',
                'property_type' => 'required',
                'property_owner' => 'required',
                'property_owner_phone_no' => 'nullable',
            ]);

            // Create a new Property instance
            $property = new Property();
            $property->name = $request->name;
            $property->description = $request->description;
            $property->location = $request->location;
            $property->map_coordinates = $request->map_coordinates;
            $property->price = $request->price;
            $property->property_type = $request->property_type;
            $property->property_owner = $request->property_owner;
            $property->property_owner_phone_no = $request->property_owner_phone_no;

            // Handle file upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('property_images', 'public');
                $property->image_url = $imagePath;
            }

            // Save the property
            $property->save();

            // Redirect back with success message
            return redirect()->route('properties_submission.show')->with('success', 'Property submission received. Admin will review shortly.');
        } catch (\Exception $e) {
            dd($e);
            // Log the exception or handle it as needed
            return redirect()->back()->withInput()->with('error', 'Failed to submit property. Please try again.');
        }
    }

}
