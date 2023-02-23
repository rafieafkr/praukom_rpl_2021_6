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
        CREATE OR REPLACE VIEW view_list_jurusan AS

        SELECT 
            jurusan.id_jurusan, 
            jurusan.nama_jurusan, 
            list_kaprog.nama_kaprog

            FROM jurusan

            INNER JOIN list_kaprog ON jurusan.kepala_jurusan = list_kaprog.id_kaprog;
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
        Schema::dropIfExists('view_list_jurusan');
    }
};