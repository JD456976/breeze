<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Product;
use App\Models\Scent;
use App\Models\Tin;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'cost' => fake()->numberBetween(10, 50),
            'color_id' => Color::factory(),
            'scent_id' => Scent::factory(),
            'tin_id' => Tin::factory(),
        ];
    }
}
