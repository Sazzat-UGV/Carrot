<?php
namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                "name"  => "Bata",
                "photo" => "Bata.png",
            ],
            [
                "name"  => "CGP Turkey",
                "photo" => "CGP Turkey.png",
            ],
            [
                "name"  => "Copa Kombi",
                "photo" => "Copa Kombi.png",
            ],
            [
                "name"  => "Lotto",
                "photo" => "Lotto.png",
            ],
            [
                "name"  => "Netflix Tudum",
                "photo" => "Netflix Tudum.png",
            ],
            [
                "name"  => "Sprite New 2022",
                "photo" => "Sprite New 2022.png",
            ],
            [
                "name"  => "Suzuki",
                "photo" => "Suzuki.png",
            ],
            [
                "name"  => "Tivo",
                "photo" => "Tivo.png",
            ],
            [
                "name"  => "TVS",
                "photo" => "TVS.png",
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name'       => $brand['name'],
                'slug'       => Str::slug($brand['name']),
                'photo'      => $brand['photo'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
