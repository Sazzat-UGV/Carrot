<?php
namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'image'       => 'slider-1.jpg',
                'title'       => 'Summer Collection',
                'heading'     => 'Explore jeans summer sale.',
                'description' => 'Get up to 50% off on all summer jeans. Limited time offer!',
                'button_name' => 'Shop Now',
                'button_link' => '#',
            ],
            [
                'image'       => 'slider-2.jpg',
                'title'       => 'Fashion for All',
                'heading'     => 'Women\'s Fashion Sale',
                'description' => 'Discover the latest fashion trends for women. Amazing discounts just for you!',
                'button_name' => 'Explore Now',
                'button_link' => '#',
            ],
            [
                'image'       => 'slider-3.jpg',
                'title'       => 'Winter Clearance',
                'heading'     => 'Up to 70% off on winter wear.',
                'description' => 'Shop your winter essentials at unbeatable prices. Hurry, sale ends soon!',
                'button_name' => 'Shop Winter',
                'button_link' => '#',
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
