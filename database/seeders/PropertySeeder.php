<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'name' => 'Luxurious Villa',
                'description' => 'A beautiful villa with stunning views.',
                'location' => 'Kathmandu',
                'map_coordinates' => '27.708317,85.3205817',
                'price' => 10000,
                'property_type' => 'room',
                'property_owner' => 'John Doe',
                'property_owner_phone_no' => '123-456-7890',
            ],
            [
                'name' => 'Cozy Apartment',
                'description' => 'A comfortable apartment in the heart of the city.',
                'location' => 'Pokhara',
                'map_coordinates' => '28.209538,83.991402',
                'price' => 7000,
                'property_type' => 'floor',
                'property_owner' => 'Jane Smith',
                'property_owner_phone_no' => '987-654-3210',
            ],
            [
                'name' => 'Spacious House',
                'description' => 'A large house with a big backyard.',
                'location' => 'Ithari',
                'map_coordinates' => '26.663168650787927,87.27302328357733',
                'price' => 12500,
                'property_type' => 'room',
                'property_owner' => 'Michael Johnson',
                'property_owner_phone_no' => '555-123-4567',
            ],
        ];

        DB::table('properties')->insert($properties);
    }
}
