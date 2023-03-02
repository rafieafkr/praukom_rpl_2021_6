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
        //
        DB::unprepared("
        CREATE OR REPLACE VIEW view_list_kelas AS

        SELECT 
            kelas.id_kelas, 
            kelas.tingkat_kelas, 
            kelas.nama_kelas, 
            view_list_walas.nama_walas, 
            jurusan.nama_jurusan,
            angkatan.tahun

        FROM kelas

        INNER JOIN view_list_walas ON kelas.id_walas = view_list_walas.id_walas

        LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan
        
        INNER JOIN angkatan ON kelas.id_angkatan = angkatan.id_angkatan;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        // Schema::dropIfExists('view_list_kelas');
    }
};