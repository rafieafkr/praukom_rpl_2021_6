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
        DB::unprepared("
        CREATE OR REPLACE FUNCTION newkodeprakerin()

        RETURNS char(10)

        BEGIN

            DECLARE kode_lama char(10);
            DECLARE kode_baru char(10);
            DECLARE ambil_angka INT;
            DECLARE get_nol char(10);
        
        SELECT MAX(id_prakerin) INTO kode_lama FROM prakerin;

        SET ambil_angka = SUBSTR(kode_lama, 4,3) + 1;

        SET get_nol = LPAD(ambil_angka, 5, 0);

        SET kode_baru = CONCAT('PRK', get_nol);

        RETURN kode_baru;

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