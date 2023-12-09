<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'family_name' => 'Dela Cruz',
            'given_name' => 'Juan',
            'email' => 'sysadmin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);
    }
}
