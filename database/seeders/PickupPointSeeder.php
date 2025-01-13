<?php

namespace Database\Seeders;

use App\Models\PickupPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PickupPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pickup_points = [
            [
                'name' => 'John Doe Salon',
                'address' => '123 Main St, City, Country',
                'primary_phone' => '123-456-7890',
                'secondary_phone' => '987-654-3210',
            ],
            [
                'name' => 'Beauty Lounge',
                'address' => '456 Elm St, Town, Country',
                'primary_phone' => '234-567-8901',
                'secondary_phone' => '876-543-2109',
            ],
            [
                'name' => 'Luxury Cuts',
                'address' => '789 Oak St, Village, Country',
                'primary_phone' => '345-678-9012',
                'secondary_phone' => '765-432-1098',
            ],
        ];

        foreach ($pickup_points as $pickup_point) {
            PickupPoint::create([
                'name' => $pickup_point['name'],
                'address' => $pickup_point['address'],
                'primary_phone' => $pickup_point['primary_phone'],
                'secondary_phone' => $pickup_point['secondary_phone'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
