<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GeneralSettingSeeder::class,
            PageSeeder::class,
            FaqSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            WarehouseSeeder::class,
            PickupPointSeeder::class,
            BrandSeeder::class,
            SliderSeeder::class,
            ProductSeeder::class,
            ServiceSeeder::class,
            ReviewSeeder::class,
            CampaignSeeder::class,
            CampaignProductSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
