<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
        $name = fake()->unique()->words(3, true);
        $costPrice = fake()->randomFloat(2, 1, 500);

        return [
            'name' => $name,
            'code' => fake()->unique()->bothify('PRD-########'),
            'slug' => Str::slug($name),
            'cost_price' => $costPrice,
            'sell_price' => $costPrice + 50,
            'description' => fake()->sentence(),
            'image' => null,
        ];
    }
}
