<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Angkatan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\angkatan>
 */
class AngkatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "tahun" => 2022
        ];
    }
}