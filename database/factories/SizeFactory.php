<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SizeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'size' => fake()->numberBetween(1,10)
        ];
    }
}
