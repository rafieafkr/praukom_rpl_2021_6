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
        DB::unprepared("
            CREATE OR REPLACE PROCEDURE procedure_pecat_siswa_pkl (nidPrakerin CHAR(4), nNis VARCHAR(15))
            BEGIN 
            DECLARE kodeError CHAR;
            BEGIN
            GET DIAGNOSTICS CONDITION 1 
            kodeError = RETURNED_SQLSTATE;
            END;
          START TRANSACTION;
          SAVEPOINT satu;
            UPDATE prakerin SET status = 2
            WHERE id_prakerin = nidPrakerin;
            DELETE FROM penilaian 
            WHERE nis = nNis;
            IF kodeError != '00000' THEN ROLLBACK TO satu;
            END IF;
            COMMIT;
          END;

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