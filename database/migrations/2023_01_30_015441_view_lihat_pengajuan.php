<?php

use Illuminate\Database\Migrations\Migration;
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
      DB::unprepared('
        CREATE OR REPLACE VIEW view_lihat_pengajuan AS
          SELECT pengajuan.id_pengajuan, pengajuan.nis, pengajuan.status_pengajuan, pengajuan.bukti_terima, siswa.nama_siswa, perusahaan.nama_perusahaan, perusahaan.alamat_perusahaan, kontak_perusahaan.kontak_perusahaan, guru.nama_guru AS pembimbing_sekolah FROM pengajuan
          INNER JOIN perusahaan ON pengajuan.id_perusahaan = perusahaan.id_perusahaan
          LEFT JOIN kontak_perusahaan ON pengajuan.id_perusahaan = kontak_perusahaan.id_perusahaan
          INNER JOIN siswa ON pengajuan.nis = siswa.nis
          LEFT JOIN pembimbing_sekolah ON pengajuan.id_ps = pembimbing_sekolah.id_ps
          LEFT JOIN guru on pembimbing_sekolah.id_guru = guru.id_guru
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::unprepared('DROP VIEW view_lihat_pengajuan');
    }
};