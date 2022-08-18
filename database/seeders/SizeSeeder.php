<?php

namespace Database\Seeders;


use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run()
    {
        Size::factory()->count(10)->create();
    }
}
