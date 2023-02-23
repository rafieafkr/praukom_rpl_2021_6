<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "id_walas" => 1,
            "id_jurusan" => 1,
            "id_angkatan" => 1,
            "nama_kelas" => "",
            "tingkat_kelas" => 12,
        ];
    }
}