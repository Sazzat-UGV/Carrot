<?php
namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\PickupPoint;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user         = User::inRandomOrder()->first();
        $category     = Category::inRandomOrder()->first();
        $subcategory  = SubCategory::where('category_id', $category->id)->inRandomOrder()->first();
        $brand        = Brand::inRandomOrder()->first();
        $warehouse    = Warehouse::inRandomOrder()->first();
        $pickup_point = PickupPoint::inRandomOrder()->first();
        $name         = $this->faker->words(3, true);

        return [
            'user_id'           => $user->id,
            'category_id'       => $category->id,
            'sub_category_id'   => $subcategory->id,
            'brand_id'          => $brand->id,
            'warehouse_id'      => $warehouse->id,
            'pickup_point_id'   => $pickup_point->id,
            'name'              => $name,
            'slug'              => Str::slug($name),
            'code'              => $this->faker->unique()->numerify('CODE-#####'),
            'tags'              => json_encode(
                collect($this->faker->randomElements([
                    'Smartphones', 'Laptops', 'Headphones', 'Watches', 'Furniture',
                    'Clothing', 'Shoes', 'Beauty Products', 'Home Decor', 'Kitchen Appliances',
                ], 3))->map(function ($value) {
                    return ['value' => $value];
                })
            ),
            'purchase_price'    => $this->faker->numberBetween(10, 500),
            'selling_price'     => $this->faker->numberBetween(50, 1000),
            'discount_price'    => $this->faker->numberBetween(10, 100),
            'product_view'      => $this->faker->numberBetween(1, 100),
            'color'             => json_encode(
                collect($this->faker->randomElements(['Red', 'Blue', 'Green', 'Black', 'White'], 2))->map(function ($value) {
                    return ['value' => $value];
                })
            ),
            'size'              => json_encode(
                collect($this->faker->randomElements(['S', 'M', 'L', 'XL'], 2))->map(function ($value) {
                    return ['value' => $value];
                })
            ),
            'stock_quantity'    => $this->faker->numberBetween(10, 100),
            'description'       => $this->faker->paragraph(10),
            'short_description' => $this->faker->paragraph,
            'thumbnail'         => $this->faker->numberBetween(1, 82) . '.jpg',
            'images'            => json_encode(
                collect($this->faker->randomElements(
                    range(1, 82),
                    $this->faker->numberBetween(1, 10)
                ))->map(function ($value) {
                    return $value . '.jpg';
                })
            ),
            'featured'          => $this->faker->boolean(),
            'today_deal'        => $this->faker->boolean(),
            'trending'          => $this->faker->boolean(),
            'status'            => $this->faker->boolean(),
        ];
    }
}
