<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(5);
        return view('admin.property.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.property.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
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

            // Redirect with success message
            return redirect()->route('admin.properties.index')->with('success', 'Property created successfully');
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Failed to create property: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to create property. Please try again.');
        }
    }

    public function show($id)
    {
        try {
            $property = Property::findOrFail($id);
            return view('admin.property.show', compact('property'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to show property: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $property = Property::findOrFail($id);
            return view('admin.property.edit', compact('property'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load edit property form: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
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

            // Find the property to update
            $property = Property::findOrFail($id);

            // Update property fields
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
                // Delete previous image if exists
                if ($property->image_url) {
                    Storage::delete($property->image_url);
                }

                // Store new image
                $imagePath = $request->file('image')->store('property_images');
                $property->image_url = $imagePath;
            }

            // Save the updated property
            $property->save();

            // Redirect with success message
            return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully');
        } catch (\Exception $e) {
            dd($e);
            // Log the exception
            \Log::error('Failed to update property: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to update property. Please try again.');
        }
    }


    public function destroy($id)
    {
        try {
            $property = Property::findOrFail($id);
            // Delete image if exists
            if ($property->image_url) {
                Storage::delete($property->image_url);
            }
            $property->delete();
            return redirect()->route('admin.properties.index')->with('success', 'Property deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete property: ' . $e->getMessage());
        }
    }
}
