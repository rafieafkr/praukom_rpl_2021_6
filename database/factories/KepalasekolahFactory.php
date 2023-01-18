<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\kepalasekolah>
 */
class KepalasekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip_guru' => 202106,
            'nama_kepsek' => 'Karto',
            'jabatan' => 'Kepala Sekolah'
        ];
    }
}