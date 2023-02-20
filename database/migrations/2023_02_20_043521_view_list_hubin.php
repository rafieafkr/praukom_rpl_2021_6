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
        CREATE VIEW list_hubin AS

        SELECT 
            staff_hubin.id_staff, 
            guru.id_guru, 
            guru.nip_guru, 
            guru.nama_guru AS nama_staff

            FROM staff_hubin

            INNER JOIN guru ON staff_hubin.id_guru = guru.id_guru;
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