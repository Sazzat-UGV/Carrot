<?php
namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campaigns = [
            [
                'title'      => 'New Year Bonanza',
                'start_date' => date('Y-m-d'),
                'end_date'   => date('Y-m-d', strtotime('+1 month')),
                'image'      => '1.jpg',
                'discount'   => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'      => 'Valentine Special Offer',
                'start_date' => date('Y-m-d'),
                'end_date'   => date('Y-m-d', strtotime('+1 month')),
                'image'      => '2.jpg',
                'discount'   => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'      => 'Winter Clearance Sale',
                'start_date' => date('Y-m-d'),
                'end_date'   => date('Y-m-d', strtotime('+1 month')),
                'image'      => '3.jpg',
                'discount'   => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'      => 'Tech Gadgets Fiesta',
                'start_date' => date('Y-m-d'),
                'end_date'   => date('Y-m-d', strtotime('+1 month')),
                'image'      => '4.jpg',
                'discount'   => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'      => 'Fashion Frenzy',
                'start_date' => date('Y-m-d'),
                'end_date'   => date('Y-m-d', strtotime('+1 month')),
                'image'      => '5.jpg',
                'discount'   => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Campaign::insert($campaigns);
    }
}
