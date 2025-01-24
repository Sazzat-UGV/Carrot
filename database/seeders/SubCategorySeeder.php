<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            'Electronics' => [
                'Mobile Phones',
                'Laptops',
                'Cameras',
                'Tablets',
                'Smart Watches',
                'Headphones',
                'Gaming Consoles',
                'Drones',
                'Wearable Tech',
                'Home Audio Systems'
            ],
            'Fashion' => [
                'Men',
                'Women',
                'Kids',
                'Footwear',
                'Accessories',
                'Jewelry',
                'Sunglasses',
                'Handbags',
                'Ethnic Wear',
                'Activewear'
            ],
            'Home & Kitchen' => [
                'Furniture',
                'Kitchenware',
                'Home Décor',
                'Bedding',
                'Lighting',
                'Cookware',
                'Storage Solutions',
                'Cleaning Supplies',
                'Wall Art',
                'Bathroom Accessories'
            ],
            'Sports & Outdoors' => [
                'Fitness',
                'Outdoor Sports',
                'Team Sports',
                'Camping Gear',
                'Cycling',
                'Running',
                'Water Sports',
                'Hiking Equipment',
                'Tennis & Racket Sports',
                'Sportswear'
            ],
            'Health & Beauty' => [
                'Skincare',
                'Haircare',
                'Wellness',
                'Makeup',
                'Fragrances',
                'Bath & Body',
                'Vitamins & Supplements',
                'Oral Care',
                'Essential Oils',
                'Health Monitoring Devices'
            ],
            'Books & Stationery' => [
                'Books',
                'Stationery',
                'Office Supplies',
                'Art Supplies',
                'Notebooks & Diaries',
                'Craft Materials',
                'Technical Manuals',
                'Planners',
                'Educational Materials',
                'File & Folder Organizers'
            ],
            'Toys & Games' => [
                'Toys',
                'Games',
                'Outdoor Toys',
                'Board Games',
                'Puzzles',
                'Dolls & Dollhouses',
                'Action Figures',
                'Learning Toys',
                'Building Sets',
                'Ride-On Toys'
            ],
            'Automotive' => [
                'Car Accessories',
                'Motorcycles',
                'Tools & Equipment',
                'Car Electronics',
                'Tires & Wheels',
                'Car Care Products',
                'Electric Scooters',
                'Motorcycle Helmets',
                'Safety Accessories',
                'Vehicle Parts'
            ],
            'Groceries & Essentials' => [
                'Fresh Produce',
                'Beverages',
                'Snacks',
                'Cooking Essentials',
                'Frozen Foods',
                'Canned Goods',
                'Organic Products',
                'Baking Supplies',
                'Dairy Products',
                'Packaged Meals'
            ],
            'Jewelry & Accessories' => [
                'Rings',
                'Necklaces',
                'Bracelets',
                'Earrings',
                'Watches',
                'Brooches',
                'Anklets',
                'Hair Accessories',
                'Chokers',
                'Cufflinks'
            ],
        ];

        foreach ($subcategories as $categoryName => $subcategoriesList) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($subcategoriesList as $subcategory) {
                    SubCategory::create([
                        'category_id' => $category->id,
                        'name' => $subcategory,
                        'slug' => Str::slug($subcategory),
                    ]);
                }
            }
        }
    }
}
