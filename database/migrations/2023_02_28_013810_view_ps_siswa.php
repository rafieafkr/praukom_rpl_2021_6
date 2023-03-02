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
        CREATE OR REPLACE VIEW view_ps_siswa AS

        SELECT 
            prakerin.id_prakerin, 
            prakerin.nis, 
            prakerin.id_ps, 
            view_list_siswa.nama_siswa,
            view_list_siswa.tingkat_kelas,
            view_list_siswa.akronim,
            view_list_siswa.nama_kelas, 
            view_list_perusahaan.nama_perusahaan 

        FROM prakerin

        INNER JOIN view_list_perusahaan ON prakerin.id_perusahaan = view_list_perusahaan.id_perusahaan
        INNER JOIN view_list_siswa ON prakerin.nis = view_list_siswa.nis;
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
    }
};