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
        CREATE VIEW view_perusahaan AS

        SELECT 
            COUNT(nis) AS jml_murid, 
            view_list_perusahaan.*

            FROM prakerin

            RIGHT JOIN view_list_perusahaan ON prakerin.id_perusahaan = view_list_perusahaan.id_perusahaan

            GROUP BY id_perusahaan

            ORDER BY jml_murid DESC;
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
        Schema::dropIfExists('view_perusahaan');
    }
};