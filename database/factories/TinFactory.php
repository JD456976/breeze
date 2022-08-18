<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\Size;
use App\Models\Tin;
use Illuminate\Database\Eloquent\Factories\Factory;

class TinFactory extends Factory
{
    protected $model = Tin::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
