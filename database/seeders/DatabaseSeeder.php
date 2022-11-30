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
        LeveluserSeeder::class,
        AkunSeeder::class,
        // PerusahaanSeeder::class,
        GuruSeeder::class,
        AngkatanSeeder::class,
        // JurusanSeeder::class,
       ]);
    }
}