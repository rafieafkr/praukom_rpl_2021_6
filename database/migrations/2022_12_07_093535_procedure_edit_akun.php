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
        CREATE OR REPLACE PROCEDURE procedure_edit_akun (nId_akun INT, nLevel_user INT)
        BEGIN
          IF(nLevel_user < 5) THEN 
            SELECT akun.*, guru.* FROM akun INNER JOIN guru ON akun.id = guru.id_akun WHERE akun.id=nId_akun;

            ELSEIF(nLevel_user = 5) THEN 
            SELECT akun.*, pembimbing_perusahaan.* FROM akun INNER JOIN pembimbing_perusahaan ON akun.id = pembimbing_perusahaan.id_akun WHERE akun.id=nId_akun;

            ELSEIF(nLevel_user = 6) THEN 
            SELECT akun.*, siswa.id_akun, siswa.nis, siswa.nama_siswa FROM akun INNER JOIN siswa ON akun.id = siswa.id_akun WHERE akun.id=nId_akun;
          END IF;
        END;
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::unprepared('DROP PROCEDURE procedure_edit_akun');
    }
};