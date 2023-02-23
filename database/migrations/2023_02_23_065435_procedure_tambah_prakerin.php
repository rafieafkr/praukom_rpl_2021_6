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
        DB::unprepared('
        CREATE OR REPLACE PROCEDURE procedure_tambah_prakerin (nId_pengajuan INT,nStatus_pengajuan INT)

          BEGIN

            DECLARE nis INT;
            DECLARE kaprog INT;
            DECLARE perusahaan INT;
            DECLARE kodeError CHAR;

            BEGIN

              GET DIAGNOSTICS CONDITION 1
              
              kodeError = RETURNED_SQLSTATE;

            END;

            START TRANSACTION;

            SAVEPOINT satu;

            UPDATE pengajuan SET status_pengajuan = nStatus_pengajuan WHERE id_pengajuan = nId_pengajuan;

            SELECT nis INTO nis FROM pengajuan WHERE id_pengajuan=nId_pengajuan;
            
            SELECT id_kaprog INTO kaprog FROM pengajuan WHERE id_pengajuan=nId_pengajuan;

            SELECT perusahaan INTO perusahaan FROM pengajuan WHERE id_pengajuan=nId_pengajuan;

            INSERT INTO prakerin (nis, nik_pp, id_ps, id_kaprog, id_perusahaan, tanggal_masuk, tanggal_keluar, status) VALUES (nis, , , kaprog, perusahaan, , , );

            COMMIT;

            IF kodeError != "00000" THEN ROLLBACK TO satu;

            END IF;
            
            COMMIT;
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
        //
    }
};