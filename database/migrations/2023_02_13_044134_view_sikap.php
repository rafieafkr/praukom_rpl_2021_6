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
        CREATE OR REPLACE VIEW view_sikap  AS 
        SELECT 
                siswa.nama_siswa, 
                siswa.nis,
                sikap.id_penilaian,
                sikap.disiplin_waktu,
                sikap.kemauan_kerja_dan_motivasi,
                sikap.kualitas_kerja,
                sikap.inisiatif_kerja,
                sikap.perilaku
                

        FROM sikap
        
        INNER JOIN penilaian ON sikap.id_penilaian = penilaian.id_penilaian
        INNER JOIN siswa ON penilaian.nis = siswa.nis
       
        

    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP VIEW view_sikap');
    }
};