<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->text(10);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'content' => $this->faker->text(50),
            'quatity' => 1000,
            'origin_price' => rand(200000, 1000000),
            'sale_price' => rand(180000, 550000),
            'category_id' => 1,
            'brand_id' => 1,
            'status' => 1,
            'option' => 1,
            'view_count' => rand(550, 5466),
            'sale_count' => rand(550, 5466),
            'review_count' => rand(550, 5466),
            'info' => rand(550, 5466),
        ];
    }
}
