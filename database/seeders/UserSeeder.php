<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jason Craig',
            'slug' => 'jason-craig',
            'email' => 'craig219@comcast.net',
            'address' => '219 Golden Bay Dr.',
            'city' => 'Pacifica',
            "state" => 'CA',
            'zip' => '94044',
            'is_admin' => 1,
            'password' => Hash::make('UPsidedown666!'),
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        User::factory()->count(10)->create();
    }
}
