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
        CREATE OR REPLACE VIEW view_monitoring AS

        SELECT 
            monitoring.*,
            view_list_kepsek.nama_kepsek,
            view_list_kepsek.nip_guru AS nip_kepsek,
            view_list_kepsek.jabatan,
            view_list_ps.nama_ps,
            view_list_ps.nip_guru AS nip_ps,
            view_list_perusahaan.nama_perusahaan,
            view_list_perusahaan.alamat_perusahaan

        FROM monitoring
        
        LEFT JOIN view_list_kepsek ON monitoring.id_kepsek = view_list_kepsek.id_kepsek
        LEFT JOIN view_list_ps ON monitoring.id_ps = view_list_ps.id_ps
        LEFT JOIN view_list_perusahaan ON monitoring.id_perusahaan = view_list_perusahaan.id_perusahaan;
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
        Schema::dropIfExists('view_monitoring');
    }
};