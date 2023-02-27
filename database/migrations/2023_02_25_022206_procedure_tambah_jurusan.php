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

        CREATE OR REPLACE PROCEDURE procedure_tambah_jurusan (nKepala_jurusan TINYINT(4), nNama_jurusan VARCHAR(30), nAkronim VARCHAR(5))
        BEGIN
          DECLARE idjurusan CHAR(5);
          DECLARE kodeError CHAR;
          BEGIN
            GET DIAGNOSTICS CONDITION 1
            kodeError = RETURNED_SQLSTATE;
          END;
          START TRANSACTION;
          SAVEPOINT satu;

          SET idjurusan = function_id_jurusan();

          INSERT INTO jurusan (id_jurusan, kepala_jurusan, nama_jurusan, akronim) 
          VALUES (idjurusan, nKepala_jurusan, nNama_jurusan, nAkronim);

          COMMIT;
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
