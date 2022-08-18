<?php

namespace Database\Factories;

use App\Models\Scent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScentFactory extends Factory
{
    protected $model = Scent::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name()
        ];
    }
}
