<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Rental Mobil',
            'email' => 'admin@rentalmobil.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // Tambahan user untuk testing
        User::create([
            'name' => 'Manager',
            'email' => 'manager@rentalmobil.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
    }
}