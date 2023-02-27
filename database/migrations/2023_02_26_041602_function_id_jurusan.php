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
        DELIMITER ||
        CREATE OR REPLACE FUNCTION function_id_jurusan()
        RETURNS char(5)
        BEGIN
          DECLARE kode_lama char(5);
          DECLARE id_jurusanbaru char(5);
          DECLARE ambil_angka INT;
          DECLARE get_nol char(10);

          SELECT MAX(id_jurusan) INTO kode_lama FROM jurusan;

          IF(kode_lama is null) THEN

            SET id_jurusanbaru = "JSR01";
            RETURN id_jurusanbaru;

          ELSE

            SET ambil_angka = SUBSTR(kode_lama, 4,5) + 1;
            SET get_nol = LPAD(ambil_angka, 2, 0);
            SET id_jurusanbaru = CONCAT("JSR", get_nol);
            RETURN id_jurusanbaru;
            
          END IF;
        END ||
        DELIMITER ;
        
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
