<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::unprepared("
        
        CREATE TRIGGER trigger_delete_penilaian
        (
            Nnis INT 
            
            BEGIN 
            DELETE FROM penilaian
            WHERE nis = Nnis; 
        )

       ");
    }
};