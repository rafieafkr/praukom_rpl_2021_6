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
            CREATE TRIGGER insertnilai_dari_prakerin 
            AFTER INSERT ON prakerin 
            FOR EACH ROW 
            BEGIN 
            INSERT INTO penilaian VALUES (
             '',
             NEW.nis,
             NEW.nik_pp
            );
            END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prakerin', function (Blueprint $table) {
            //
        });
    }
};
