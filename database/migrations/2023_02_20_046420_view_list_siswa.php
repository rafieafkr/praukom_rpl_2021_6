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
            list_kelas.tingkat_kelas, 
            list_kelas.nama_kelas, 
            list_kelas.nama_walas, 
            list_jurusan.nama_jurusan, 
            list_jurusan.nama_kaprog
            
            FROM siswa

            LEFT JOIN list_kelas ON siswa.id_kelas = list_kelas.id_kelas

            LEFT JOIN list_jurusan ON siswa.jurusan = list_jurusan.id_jurusan;
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
        Schema::dropIfExists('view_list_siswa');
    }
};