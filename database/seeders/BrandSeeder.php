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
            'brand-1',
            'brand-2',
            'brand-3',
            'brand-4',
            'brand-5',
            'brand-6',
            'brand-7',
            'brand-8',
            'brand-9',
            'brand-10',
            'brand-11',
            'brand-12',
            'brand-13',
            'brand-14',
            'brand-15',
        ];
        foreach ($brands as $brand) {
            Brand::create([
                'brand_name' => $brand,
                'brand_slug' => Str::slug($brand),
            ]);
        }
    }
}
