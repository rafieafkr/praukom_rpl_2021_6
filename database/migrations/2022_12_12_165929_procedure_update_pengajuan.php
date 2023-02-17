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
        CREATE OR REPLACE PROCEDURE procedure_update_pengajuan (nId_pengajuan INT, nId_perusahaan INT, nNIS VARCHAR(15), nPerusahaan VARCHAR(60), nAlamat_perusahaan VARCHAR(60), nTelepon_perusahaan VARCHAR(60), nKaprog INT, nWalas INT, nStaff_hubin INT, nBukti_terima VARCHAR(255))
          BEGIN
            DECLARE kodeError CHAR;

            BEGIN
              GET DIAGNOSTICS CONDITION 1
              kodeError = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;

            UPDATE perusahaan SET nama_perusahaan = nPerusahaan, alamat_perusahaan = nAlamat_perusahaan
            WHERE id_perusahaan = nId_perusahaan;

            UPDATE kontak_perusahaan SET kontak_perusahaan = nTelepon_perusahaan
            WHERE id_perusahaan = nId_perusahaan;
            
            UPDATE pengajuan SET nis = nNIS, id_kaprog = nKaprog, id_walas = nWalas, id_staff = nStaff_hubin, bukti_terima = nBukti_terima WHERE id_pengajuan = nId_pengajuan;
            
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
        DB::unprepared('DROP PROCEDURE procedure_update_pengajuan');
    }
};