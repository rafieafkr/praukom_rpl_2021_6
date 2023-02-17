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
        CREATE OR REPLACE VIEW view_jurusan_kompetensi  AS 
        SELECT 
                jurusan.nama_jurusan, 
                jurusan.akronim, 
                jurusan.id_jurusan, 
                kepala_program.id_kaprog, 
                guru.nama_guru

        FROM jurusan
        
        INNER JOIN kepala_program ON jurusan.kepala_jurusan = kepala_program.id_kaprog
        INNER JOIN guru ON kepala_program.id_guru = guru.id_guru

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