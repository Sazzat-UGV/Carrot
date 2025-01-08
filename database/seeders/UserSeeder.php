<?php

namespace Database\Seeders;

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
            'name' => 'Asikul Islam Sazzat',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'email_verified_at' => now(),
            'password' => Hash::make(1234),
        ]);
        User::create([
            'name' => 'Roger S. Allen',
            'email' => 'RogerSAllen@armyspy.com',
            'address' => '2440 Boundary Street Jacksonville, FL 32208',
            'phone' => '904-713-1558',
            'role' => 'User',
            'email_verified_at' => now(),
            'password' => Hash::make(1234),
        ]);
        User::create([
            'name' => 'Kevin J. Harter',
            'email' => 'DonaldSLewis@teleworm.us',
            'address' => '499 Raoul Wallenberg Place Stamford, CT 06902',
            'phone' => '203-883-9331',
            'role' => 'User',
            'email_verified_at' => now(),
            'password' => Hash::make(1234),
        ]);
        User::create([
            'name' => 'Gene A. Green',
            'email' => 'GeneAGreen@teleworm.us',
            'address' => '414 John Daniel Drive Saint Louis, MO 63101',
            'phone' => '573-710-9095',
            'role' => 'User',
            'email_verified_at' => now(),
            'password' => Hash::make(1234),
        ]);
        User::create([
            'name' => 'Carmen J. Alley',
            'email' => 'CarmenJAlley@dayrep.com',
            'address' => '4224 Pringle Drive Elk Grove Village, IL 60007',
            'phone' => '312-416-5374',
            'role' => 'User',
            'email_verified_at' => now(),
            'password' => Hash::make(1234),
        ]);
        User::create([
            'name' => 'Kevin J. Harter',
            'email' => 'KevinJHarter@rhyta.com',
            'address' => '115 Rainbow Drive Richfield, OH 44286',
            'phone' => '330-523-6618',
            'role' => 'User',
            'email_verified_at' => now(),
            'password' => Hash::make(1234),
        ]);
    }
}
