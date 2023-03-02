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
        CREATE OR REPLACE VIEW view_list_siswa AS

        SELECT 
            siswa.*, 
            view_list_kelas.tingkat_kelas,
            view_list_kelas.nama_kelas,
            view_list_kelas.nama_walas,
            view_list_kelas.tahun,
            view_list_jurusan.*
            
            FROM siswa

            LEFT JOIN view_list_kelas ON siswa.id_kelas = view_list_kelas.id_kelas
            LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
            LEFT JOIN view_list_jurusan ON kelas.id_jurusan = view_list_jurusan.id_jurusan;
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
        // Schema::dropIfExists('view_list_siswa');
    }
};