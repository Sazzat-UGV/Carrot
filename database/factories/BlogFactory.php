<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $admin = User::findOrFail(1);
        return [
            'creator_id'        => 1,
            'title'             => $this->faker->sentence(5),
            'slug'              => Str::slug($this->faker->unique()->sentence(5)),
            'short_description' => $this->faker->paragraph(2),
            'description'       => $this->faker->paragraph(10),
            'image'             => rand(1, 15) . '.jpg',
        ];

    }

}
