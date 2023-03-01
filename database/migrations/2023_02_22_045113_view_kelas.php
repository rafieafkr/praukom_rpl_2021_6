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
        CREATE OR REPLACE VIEW view_kelas AS 
        SELECT 
                
                angkatan.tahun,
                jurusan.nama_jurusan,
                guru.nama_guru as nama_walas,
                kelas.nama_kelas,
                kelas.tingkat_kelas,
                kelas.id_kelas,
                kelas.id_walas,
                kelas.id_jurusan,
                kelas.id_angkatan  

        FROM kelas
        
        LEFT JOIN wali_kelas ON kelas.id_walas = wali_kelas.id_walas
        INNER JOIN guru ON guru.id_guru = wali_kelas.id_guru
        INNER JOIN angkatan ON kelas.id_angkatan = angkatan.id_angkatan
        INNER JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan
       
    
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::unprepared('DROP VIEW view_kelas');
    }
};