<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouses = [
            [
                'name' => 'Central Warehouse',
                'phone' => '1234567890',
                'address' => '123 Main Street, Cityville, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'North Warehouse',
                'phone' => '9876543210',
                'address' => '456 North Avenue, Uptown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'South Warehouse',
                'phone' => '1122334455',
                'address' => '789 South Road, Midtown, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'East Warehouse',
                'phone' => '5566778899',
                'address' => '321 East Street, Eastside, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'West Warehouse',
                'phone' => '6677889900',
                'address' => '654 West Lane, Westville, USA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Warehouse::insert($warehouses);
    }
}
