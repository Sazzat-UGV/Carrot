<?php
namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'icon'        => '<i class="ri-red-packet-line"></i>',
                'title'       => 'Product Packing',
                'description' => 'Your orders are carefully packed with precision to ensure they arrive in perfect condition, every time.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'icon'        => '<i class="ri-customer-service-2-line"></i>',
                'title'       => '24x7 Support',
                'description' => 'Our dedicated support team is available 24/7 to assist you with any questions or concerns, anytime you need us.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'icon'        => '<i class="ri-truck-line"></i>',
                'title'       => 'Delivery in 5 Days',
                'description' => 'Get your favorite products delivered right to your doorstep within just 5 days—fast and reliable service guaranteed.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'icon'        => '<i class="ri-money-dollar-box-line"></i>',
                'title'       => 'Payment Secure',
                'description' => 'Experience worry-free shopping with our secure payment options, ensuring your transactions are safe and protected.',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];
        Service::insert($services);
    }
}
