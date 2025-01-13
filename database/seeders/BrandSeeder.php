<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                "name" => "ApexTech",
            ],
            [
                "name" => "UrbanCraft",
            ],
            [
                "name" => "NovaTrend",
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand['name'],
                'slug' => Str::slug($brand['name']),
                'photo' => 'demo_brand.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
