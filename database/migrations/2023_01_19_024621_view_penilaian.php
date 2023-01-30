<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE OR REPLACE VIEW view_penilaian  AS 
        SELECT 
                siswa.nama_siswa, 
                siswa.nis, 
                pembimbing_perusahaan.nama_pp, 
                penilaian.id_penilaian,
                nilai.nilai,
                kompetensi.nama_kompetensi

        FROM penilaian
        
        INNER JOIN siswa ON penilaian.nis = siswa.nis
        INNER JOIN nilai ON penilaian.id_penilaian = nilai.id_penilaian
        INNER JOIN pembimbing_perusahaan ON penilaian.nik_pp = pembimbing_perusahaan.nik_pp
        INNER JOIN kompetensi ON nilai.kompetensi = kompetensi.id_kompetensi

    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW view_penilaian');
    }
};