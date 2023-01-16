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
      DB::unprepared('
        CREATE OR REPLACE VIEW view_lihat_akun AS
          SELECT akun.*, level_user.nama_level, guru.nama_guru, pembimbing_perusahaan.nama_pp, siswa.nama_siswa FROM akun 
          INNER JOIN level_user ON akun.level_user = level_user.id_level 
          LEFT JOIN guru ON akun.id_akun = guru.id_akun
          LEFT JOIN pembimbing_perusahaan ON akun.id_akun = pembimbing_perusahaan.id_akun
          LEFT JOIN siswa ON akun.id_akun = siswa.id_akun
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::unprepared('DROP PROCEDURE procedure_lihat_akun');
    }
};