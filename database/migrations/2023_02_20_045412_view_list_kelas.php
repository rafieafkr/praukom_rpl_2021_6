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
            list_walas.nama_walas, 
            jurusan.nama_jurusan

        FROM kelas

        INNER JOIN list_walas ON kelas.id_walas = list_walas.id_walas

        LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan;
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
        Schema::dropIfExists('view_list_kelas');
    }
};