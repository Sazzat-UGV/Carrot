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
            [
                'name' => 'Electronics',
                'icon' => '<i class="fi fi-tr-hat-cowboy-side"></i>',
                'show_home'=>1,
            ],
            [
                'name' => 'Fashion',
                'icon' => '<i class="fi fi-tr-boot-heeled"></i>',
                'show_home'=>1,
            ],
            [
                'name' => 'Home & Kitchen',
                'icon' => '<i class="fi fi-tr-shirt-tank-top"></i>',
                'show_home'=>1,
            ],
            [
                'name' => 'Sports & Outdoors',
                'icon' => '<i class="fi fi-tr-shirt-long-sleeve"></i>',
                'show_home'=>1,
            ],
            [
                'name' => 'Health & Beauty',
                'icon' => '<i class="fi fi-tr-sunglasses"></i>',
                'show_home'=>1,
            ],
            [
                'name' => 'Books & Stationery',
                'icon' => '<i class="fi fi-tr-socks"></i>',
                'show_home'=>0,
            ],
            [
                'name' => 'Toys & Games',
                'icon' => '<i class="fi fi-tr-vest"></i>',
                'show_home'=>1,
            ],
            [
                'name' => 'Automotive',
                'icon' => '<i class="fi fi-tr-shirt-tank-top"></i>',
                'show_home'=>1,
            ],
            [
                'name' => 'Groceries & Essentials',
                'icon' => '<i class="fi fi-tr-sunglasses"></i>',
                'show_home'=>1,
            ],
            [
                'name' => 'Jewelry & Accessories',
                'icon' => '<i class="fi fi-tr-socks"></i>',
                'show_home'=>0,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'icon' => $category['icon'],
                'name' => $category['name'],
                'show_home' => $category['show_home'],
                'slug' => Str::slug($category['name']),
            ]);
        }
    }

}
