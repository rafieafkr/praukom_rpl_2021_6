<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Akun;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pilihps>
 */
class PilihpsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
          Akun::hydrate(DB::select('CALL procedure_tambah_akun(?, ?, ?, ?, ?, ?)', [
            rand(1, 6),
            fake()->email(),
            Hash::make('password'),
            fake()->userName(),
            fake()->name(),
            rand(1000000000, 9999999999)
          ]))];
    }
}