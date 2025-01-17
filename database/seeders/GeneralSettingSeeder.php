<?php
namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::updateOrCreate([
            'site_name'        => 'Carrot',
            'site_description' => 'Carrot is the biggest market of grocery products. Get your daily needs from our store.',
            'site_keywords'    => '[
                {"value": "Smartphones"},
                {"value": "Laptops"},
                {"value": "Headphones"},
                {"value": "Watches"},
                {"value": "Furniture"},
                {"value": "Clothing"},
                {"value": "Shoes"},
                {"value": "Beauty Products"},
                {"value": "Home Decor"},
                {"value": "Kitchen Appliances"}
            ]',
            'email'            => 'example@email.com',
            'phone_number'     => '+91 123 4567890',
            'physical_address' => '51 Green St.Huntington ohaio beach ontario, NY 11746 KY 4783, USA.',
            'site_logo'        => 'logo.png',
            'site_favicon'     => 'favicon.png',
            'breadcrumb_image' => 'breadcrumb.jpg',
            'facebook_url' => '#',
            'twitter_url' => '#',
            'instagram_url' => '#',
            'youtube_url' => '#',
            'linkedin_url' => '#',
        ]);
    }
}
