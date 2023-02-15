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
        CREATE OR REPLACE PROCEDURE procedure_tambah_pengajuan (nNIS VARCHAR(15), nPerusahaan VARCHAR(60), nAlamat_perusahaan VARCHAR(60), nTelepon_perusahaan VARCHAR(60), nKaprog INT, nWalas INT, nStaff_hubin INT, nBukti_terima VARCHAR(255))
          BEGIN
            DECLARE idperusahaan INT;
            DECLARE kodeError CHAR;

            BEGIN
              GET DIAGNOSTICS CONDITION 1
              kodeError = RETURNED_SQLSTATE;
            END;

            START TRANSACTION;
            SAVEPOINT satu;
            INSERT INTO perusahaan (nama_perusahaan, alamat_perusahaan) VALUES (nPerusahaan, nAlamat_perusahaan);

            SELECT MAX(id_perusahaan) INTO idperusahaan FROM perusahaan WHERE nama_perusahaan=nPerusahaan AND alamat_perusahaan=nAlamat_perusahaan;
            INSERT INTO kontak_perusahaan (id_perusahaan, kontak_perusahaan) VALUES (idperusahaan, nTelepon_perusahaan);
            
            INSERT INTO pengajuan (nis, id_perusahaan, id_kaprog, id_walas, id_staff, bukti_terima) VALUES (nNIS, idperusahaan, nKaprog, nWalas, nStaff_hubin, nBukti_terima);
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
        DB::unprepared('DROP PROCEDURE procedure_tambah_pengajuan');
    }
};