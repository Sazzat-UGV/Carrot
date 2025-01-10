<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            [
                'category' => 'Electronics',
                'subcategories' => [
                    ['name' => 'Mobile Phones'],
                    ['name' => 'Laptops'],
                    ['name' => 'Cameras'],
                ],
            ],
            [
                'category' => 'Fashion',
                'subcategories' => [
                    ['name' => 'Men'],
                    ['name' => 'Women'],
                    ['name' => 'Kids'],
                ],
            ],
            [
                'category' => 'Home & Kitchen',
                'subcategories' => [
                    ['name' => 'Furniture'],
                    ['name' => 'Kitchenware'],
                    ['name' => 'Home Décor'],
                ],
            ],
            [
                'category' => 'Sports & Outdoors',
                'subcategories' => [
                    ['name' => 'Fitness'],
                    ['name' => 'Outdoor Sports'],
                    ['name' => 'Team Sports'],
                ],
            ],
            [
                'category' => 'Health & Beauty',
                'subcategories' => [
                    ['name' => 'Skincare'],
                    ['name' => 'Haircare'],
                    ['name' => 'Wellness'],
                ],
            ],
            [
                'category' => 'Books & Stationery',
                'subcategories' => [
                    ['name' => 'Books'],
                    ['name' => 'Stationery'],
                    ['name' => 'Office Supplies'],
                ],
            ],
            [
                'category' => 'Toys & Games',
                'subcategories' => [
                    ['name' => 'Toys'],
                    ['name' => 'Games'],
                    ['name' => 'Outdoor Toys'],
                ],
            ],
            [
                'category' => 'Automotive',
                'subcategories' => [
                    ['name' => 'Car Accessories'],
                    ['name' => 'Motorcycles'],
                    ['name' => 'Tools & Equipment'],
                ],
            ],
            [
                'category' => 'Groceries & Essentials',
                'subcategories' => [
                    ['name' => 'Fresh Produce'],
                    ['name' => 'Beverages'],
                    ['name' => 'Snacks'],
                ],
            ],
            [
                'category' => 'Jewelry & Accessories',
                'subcategories' => [
                    ['name' => 'Rings'],
                    ['name' => 'Necklaces'],
                    ['name' => 'Bracelets'],
                ],
            ],
        ];

        foreach ($subcategories as $subcategoryData) {
            $category = Category::where('name', $subcategoryData['category'])->first();

            if ($category) {
                foreach ($subcategoryData['subcategories'] as $subcategory) {
                    SubCategory::create([
                        'category_id' => $category->id,
                        'name' => $subcategory['name'],
                        'slug' => Str::slug($subcategory['name']),
                    ]);
                }
            }
        }
    }
}
