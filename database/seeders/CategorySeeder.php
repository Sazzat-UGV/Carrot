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
            'Category-1',
            'Category-2',
            'Category-3',
            'Category-4',
            'Category-5',
        ];
        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category,
                'category_slug' => Str::slug($category),
            ]);
        }
    }
}
