<?php

namespace Database\Seeders;

use App\Models\Tin;
use Illuminate\Database\Seeder;

class TinSeeder extends Seeder
{
    public function run()
    {
        Tin::factory()->count(10)->create();
    }
}
