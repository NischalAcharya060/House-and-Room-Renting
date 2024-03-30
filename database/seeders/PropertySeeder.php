<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            'name' => 'Beautiful Villa',
            'description' => 'A luxurious villa with stunning views.',
            'location' => '123 Main Street, City',
            'map_coordinates' => '40.7128° N, 74.0060° W',
            'price' => 1000000,
            'property_type' => 'Villa',
            'property_owner' => 'John Doe',
            'property_owner_phone_no' => '123-456-7890',
        ]);

    }
}
