<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 5 dummy data records
        for ($i = 1; $i <= 2; $i++) {
            Property::create([
                'name' => 'Property ' . $i,
                'description' => 'Description of Property ' . $i,
                'location' => 'Location of Property ' . $i,
                'map_coordinates' => 'Coordinates of Property ' . $i,
                'price' => rand(10000, 1000000),
                'property_type' => 'Room',
                'property_owner' => 'Owner of Property ' . $i,
                'property_owner_phone_no' => 'Phone No. of Owner ' . $i,
            ]);
        }
    }
}
