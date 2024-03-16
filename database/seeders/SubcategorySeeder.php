<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            'Subcategory-1',
            'Subcategory-2',
            'Subcategory-3',
            'Subcategory-4',
            'Subcategory-5',
            'Subcategory-6',
            'Subcategory-7',
            'Subcategory-8',
            'Subcategory-9',
            'Subcategory-11',
            'Subcategory-12',
            'Subcategory-13',
            'Subcategory-14',
            'Subcategory-15',
            'Subcategory-16',
        ];
        foreach ($subcategories as $subcategory) {
            Subcategory::create([
                'category_id' => rand(1, 5),
                'subcategory_name' => $subcategory,
                'subcategory_slug' => Str::slug($subcategory),
            ]);
        }
    }
}
