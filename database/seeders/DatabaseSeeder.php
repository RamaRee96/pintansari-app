<?php

namespace Database\Seeders;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Patient;
use App\Models\RekamMedis;
use App\Models\RekamMedisHasObat;
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
            "email" => "admin@gmail.com",
            "password" => bcrypt('password'),
            "role" => "admin",
        ]);
        User::create([
            "name" => "resepsionis",
            "email" => "user2@gmail.com",
            "password" => bcrypt('password'),
            "role" => "resepsionis",
        ]);
        User::create([
            "name" => "apoteker",
            "email" => "user3@gmail.com",
            "password" => bcrypt('password'),
            "role" => "apoteker",
        ]);
        User::create([
            "name" => "doktor",
            "email" => "user4@gmail.com",
            "password" => bcrypt('password'),
            "role" => "dokter",
        ]);


        User::factory()->count(10)->create();
        Patient::factory()->count(10)->create();
        RekamMedis::factory()->count(10)->create();
        Obat::factory()->count(10)->create();
        RekamMedisHasObat::factory()->count(10)->create();
    }
}
