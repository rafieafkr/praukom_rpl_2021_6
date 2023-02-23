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
        CREATE  OR REPLACE VIEW view_belum_prakerin AS
        
        SELECT 
            prakerin.id_prakerin, 
            view_list_siswa.*

            FROM prakerin

            RIGHT JOIN view_list_siswa ON prakerin.nis = view_list_siswa.nis
            
            WHERE id_prakerin IS NULL;
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