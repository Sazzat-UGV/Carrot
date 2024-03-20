<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Childcategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChildcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $childcategories = [
            'Childcategory-1',
            'Childcategory-2',
            'Childcategory-3',
            'Childcategory-4',
            'Childcategory-5',
            'Childcategory-6',
            'Childcategory-7',
            'Childcategory-8',
        ];
        foreach ($childcategories as $childcategory) {
            Childcategory::create([
                'category_id' => rand(1, 2),
                'subcategory_id' => rand(1, 7),
                'childcategory_name' => $childcategory,
                'childcategory_slug' => Str::slug($childcategory),
            ]);
        }
    }
}
