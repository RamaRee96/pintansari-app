<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            "name" => "admin",
            "email" => "adminklinik@gmail.com",
            "password" => bcrypt('password'),
            "role" => "admin",
        ]);

        User::create([
            "name" => "resepsionis 1",
            "email" => "resepsionis@gmail.com",
            "password" => bcrypt('password'),
            "role" => "resepsionis",
        ]);
        User::create([
            "name" => "dokter 1",
            "email" => "dokter@gmail.com",
            "password" => bcrypt('password'),
            "role" => "dokter",
        ]);
        User::create([
            "name" => "apoteker 1",
            "email" => "apoteker@gmail.com",
            "password" => bcrypt('password'),
            "role" => "apoteker",
        ]);

        User::factory(1)->create();
    }
}
