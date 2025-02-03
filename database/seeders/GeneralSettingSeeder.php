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
            'map'=>' <iframe
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319"
                        title="maps">
                    </iframe>',
            'facebook_url' => '#',
            'twitter_url' => '#',
            'instagram_url' => '#',
            'youtube_url' => '#',
            'linkedin_url' => '#',
        ]);
    }
}
