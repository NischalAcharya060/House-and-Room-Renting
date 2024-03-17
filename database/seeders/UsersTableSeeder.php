<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ritesh Dhakal',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Ritesh@123'),
            'user_type' => 'admin', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
