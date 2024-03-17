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
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'location' => 'required',
        'map_coordinates' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'price' => 'required|numeric',
        'property_type' => 'required',
        'property_owner' => 'required',
        'property_owner_phone_no' => 'required',
    ]);

    try {
        $property = new Property();
        $property->name = $request->name;
        $property->description = $request->description;
        $property->location = $request->location;
        $property->map_coordinates = $request->map_coordinates;
        $property->price = $request->price;
        $property->property_type = $request->property_type;
        $property->property_owner = $request->property_owner;
        $property->property_owner_phone_no = $request->property_owner_phone_no;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('property_images', 'public');
            $property->image_url = $imagePath;
        }

        $property->save();

        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to create property: ' . $e->getMessage());
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
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'location' => 'required',
        'map_coordinates' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        'price' => 'required|numeric',
        'property_type' => 'required',
        'property_owner' => 'required',
        'property_owner_phone_no' => 'required',
    ]);

    try {
        $property = Property::findOrFail($id);
        $property->name = $request->name;
        $property->description = $request->description;
        $property->location = $request->location;
        $property->map_coordinates = $request->map_coordinates;
        $property->price = $request->price;
        $property->property_type = $request->property_type;
        $property->property_owner = $request->property_owner;
        $property->property_owner_phone_no = $request->property_owner_phone_no;

        if ($request->hasFile('image')) {
            // Delete previous image
            Storage::delete($property->image_url);

            $imagePath = $request->file('image')->store('property_images');
            $property->image_url = $imagePath;
        }

        $property->save();

        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to update property: ' . $e->getMessage());
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
