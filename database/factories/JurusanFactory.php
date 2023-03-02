<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jurusan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jurusan>
 */
class JurusanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "id_jurusan" => "JRS01",
            "kepala_jurusan" => 1,
            "nama_jurusan" => "Rekayasa Perangkat Lunak",
            "akronim" => "RPL",
        ];
    }
}