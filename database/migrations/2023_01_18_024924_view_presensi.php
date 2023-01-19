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
        CREATE VIEW OR REPLACE view_presensi AS 
        SELECT 
                siswa.nama_siswa, 
                siswa.nis, 
                pembimbing_perusahaan.nama_pp, 
                presensi_siswa.tgl_kehadiran, 
                presensi_siswa.jam_masuk,
                presensi_siswa.jam_keluar,
                presensi_siswa.keterangan,
                presensi_siswa.kegiatan,
                presensi_siswa.status,
                presensi_siswa.id_presensi

        FROM presensi_siswa
        
        INNER JOIN siswa ON presensi_siswa.nis = siswa.nis
        INNER JOIN pembimbing_perusahaan ON presensi_siswa.nik_pp = pembimbing_perusahaan.nik_pp

    ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP view_presensi');
    }
};
