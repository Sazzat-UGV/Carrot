<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users=User::inRandomOrder()->first();
        $products=Product::inRandomOrder()->first();
        return [
            'product_id'=>$products->id,
            'user_id'=>$users->id,
            'rating'=>$this->faker->numberBetween(1, 5),
            'comment'=>$this->faker->paragraph(),
        ];
    }
}

