<?php

use Illuminate\Database\Migrations\Migration;
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
      DB::unprepared('
        CREATE OR REPLACE VIEW view_lihat_pengajuan AS
          SELECT pengajuan.id_pengajuan, pengajuan.nis, perusahaan.nama_perusahaan, pengajuan.status_pengajuan, pengajuan.bukti_terima FROM pengajuan
          INNER JOIN perusahaan ON pengajuan.id_perusahaan = perusahaan.id_perusahaan
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::unprepared('DROP VIEW view_lihat_pengajuan');
    }
};