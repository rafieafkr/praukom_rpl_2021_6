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
        CREATE VIEW list_perusahaan AS

        SELECT 
            perusahaan.id_perusahaan, 
            perusahaan.nama_perusahaan, 
            perusahaan.alamat_perusahaan, 
            kontak_perusahaan.kontak_perusahaan

            FROM perusahaan

            LEFT JOIN kontak_perusahaan ON perusahaan.id_perusahaan = kontak_perusahaan.id_perusahaan;
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