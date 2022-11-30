<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'kepala_jurusan' => 1,
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'akronim' => 'RPL'
        ];

        return [
            'kepala_jurusan' => 2,
            'nama_jurusan' => 'Akutansi',
            'akronim' => 'AK'
        ];

        return [
            'kepala_jurusan' => 3,
            'nama_jurusan' => 'Teknik Kendaraan Ringan',
            'akronim' => 'TKR'
        ];

        return [
            'kepala_jurusan' => 4,
            'nama_jurusan' => 'Teknik Pengelasan',
            'akronim' => 'TPL'
        ];

        return [
            'kepala_jurusan' => 5,
            'nama_jurusan' => 'Teknik Pemesinan',
            'akronim' => 'TP'
        ];

        return [
            'kepala_jurusan' => 6,
            'nama_jurusan' => 'TKJ',
            'akronim' => 'Teknik Komputer Jaringan'
        ];

        return [
            'kepala_jurusan' => 7,
            'nama_jurusan' => 'Multimedia',
            'akronim' => 'MM'
        ];

        return [
            'kepala_jurusan' => 8,
            'nama_jurusan' => 'Busana Butik',
            'akronim' => 'BB'
        ];
    }
}