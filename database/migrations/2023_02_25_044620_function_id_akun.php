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
          CREATE OR REPLACE FUNCTION function_id_akun()
          RETURNS char(10)
          BEGIN
            DECLARE kode_lama char(10);
            DECLARE kode_baru char(10);
            DECLARE ambil_angka INT;
            DECLARE get_nol char(10);

            SELECT MAX(id) INTO kode_lama FROM akun;

            IF(kode_lama is null) THEN
              SET kode_baru = "USR0000001";
              RETURN kode_baru;
            ELSE
              SET ambil_angka = SUBSTR(kode_lama, 4,7) + 1;
              SET get_nol = LPAD(ambil_angka, 7, 0);
              SET kode_baru = CONCAT("USR", get_nol);
              RETURN kode_baru;
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
        //
    }
};