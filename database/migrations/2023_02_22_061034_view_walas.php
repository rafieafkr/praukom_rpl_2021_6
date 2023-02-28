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
        CREATE OR REPLACE VIEW view_walas AS 
        SELECT 
                
               wali_kelas.id_guru,
               wali_kelas.id_walas,
               guru.nama_guru

        FROM wali_kelas
        
        INNER JOIN guru ON wali_kelas.id_guru = guru.id_guru
    
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW view_walas');
    }
};