<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics'],
            ['name' => 'Fashion'],
            ['name' => 'Home & Kitchen'],
            ['name' => 'Sports & Outdoors'],
            ['name' => 'Health & Beauty'],
            ['name' => 'Books & Stationery'],
            ['name' => 'Toys & Games'],
            ['name' => 'Automotive'],
            ['name' => 'Groceries & Essentials'],
            ['name' => 'Jewelry & Accessories'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
            ]);
        }
    }

}
