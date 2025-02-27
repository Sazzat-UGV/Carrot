<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CampaignProduct>
 */
class CampaignProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'  => Product::inRandomOrder()->value('id'), 
            'campaign_id' => Campaign::inRandomOrder()->value('id'), 
            'price'       => $this->faker->numberBetween(10, 100),
        ];
    }
}
