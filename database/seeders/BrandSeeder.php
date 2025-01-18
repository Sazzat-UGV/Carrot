<?php
namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                "name"  => "ApexTech",
                "photo" => "brand-1.png",
            ],
            [
                "name"  => "UrbanCraft",
                "photo" => "brand-2.png",
            ],
            [
                "name"  => "NovaTrend",
                "photo" => "brand-3.png",
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name'       => $brand['name'],
                'slug'       => Str::slug($brand['name']),
                'photo'      => $brand['photo'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
