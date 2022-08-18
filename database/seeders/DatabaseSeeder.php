<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TinSeeder::class,
            ColorSeeder::class,
            ScentSeeder::class,
            ProductSeeder::class,
            SizeSeeder::class,
            OrderSeeder::class
        ]);
    }
}
