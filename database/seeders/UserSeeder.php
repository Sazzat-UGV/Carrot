<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Asikul Islam Sazzat',
            'email'=>'admin@gmail.com',
            'role'=>'Admin',
            'email_verified_at'=>now(),
            'password'=>Hash::make(1234),
        ]);
        User::create([
            'name'=>'Sarah Moni',
            'email'=>'user@gmail.com',
            'role'=>'User',
            'email_verified_at'=>now(),
            'password'=>Hash::make(1234),
        ]);
    }
}
