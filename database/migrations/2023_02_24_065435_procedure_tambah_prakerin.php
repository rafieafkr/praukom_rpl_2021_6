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
        CREATE OR REPLACE PROCEDURE procedure_tambah_prakerin (nId_pengajuan INT,nNis VARCHAR(15), nId_kaprog INT, nId_perusahaan INT, nStatus_pengajuan INT)

          BEGIN

            DECLARE nis VARCHAR(15);
            DECLARE kaprog INT;
            DECLARE perusahaan INT;
            DECLARE kodeError CHAR;
            DECLARE kodePrakerin CHAR(10);

            BEGIN

              GET DIAGNOSTICS CONDITION 1
              
              kodeError = RETURNED_SQLSTATE;

            END;

            START TRANSACTION;

            SAVEPOINT satu;

            UPDATE pengajuan SET status_pengajuan = nStatus_pengajuan WHERE id_pengajuan = nId_pengajuan;

            SELECT nNis INTO nis FROM pengajuan WHERE id_pengajuan=nId_pengajuan;
            
            SELECT nId_kaprog INTO kaprog FROM pengajuan WHERE id_pengajuan=nId_pengajuan;

            SELECT nId_perusahaan INTO perusahaan FROM pengajuan WHERE id_pengajuan=nId_pengajuan;

            SET kodePrakerin = newkodeprakerin();

            INSERT INTO prakerin (id_prakerin, nis, id_kaprog, id_perusahaan) VALUES (kodePrakerin, nis, kaprog, perusahaan);

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
        Schema::dropIfExists('procedure_tambah_prakerin');
    }
};