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
        CREATE OR REPLACE VIEW view_list_kepsek AS

        SELECT 
            kepala_sekolah.*,
            guru.nama_guru AS nama_kepsek,
            guru.nip_guru

        FROM kepala_sekolah
        
        INNER JOIN guru ON kepala_sekolah.id_guru = guru.id_guru;
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
        Schema::dropIfExists('view_list_kepsek');
    }
};