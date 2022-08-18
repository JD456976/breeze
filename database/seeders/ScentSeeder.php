<?php

namespace Database\Seeders;

use App\Models\Scent;
use Illuminate\Database\Seeder;

class ScentSeeder extends Seeder
{
    public function run()
    {
        Scent::factory()->count(10)->create();
    }
}
