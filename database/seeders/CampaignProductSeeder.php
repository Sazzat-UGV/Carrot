<?php

namespace Database\Seeders;

use App\Models\CampaignProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CampaignProduct::factory()->count(100)->create();
    }
}
