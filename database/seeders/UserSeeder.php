<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@tamanair.com',
            'phone' => '081234567890',
            'password' => Hash::make('password'), // Password: password
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'email' => 'user@gmail.com',
            'phone' => '089876543210',
            'password' => Hash::make('password'), // Password: password
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
