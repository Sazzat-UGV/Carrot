<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Asikul Islam Sazzat',
            'email' => 'admin@gmail.com',
            'phone' => '01755805553',
            'address' => 'Barishal',
            'email_verified_at' => now(),
            'is_admin' => 1,
            'password' => Hash::make('admin@gmail.com'),
            'remember_token' => Str::random(10),
        ]);
    }
}
