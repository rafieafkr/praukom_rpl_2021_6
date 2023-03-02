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
        CREATE OR REPLACE VIEW view_print_pengajuan AS
          SELECT 
            pengajuan.id_pengajuan, 
            pengajuan.status_pengajuan,
            siswa.nama_siswa, 
            siswa.nis,
            kelas.tingkat_kelas,
            jurusan.akronim,
            kelas.nama_kelas,
            siswa.tempat_lahir,
            siswa.tanggal_lahir,
            perusahaan.nama_perusahaan, 
            perusahaan.alamat_perusahaan, 
            kontak_perusahaan.kontak_perusahaan, 
            ps.nama_guru AS pembimbing_sekolah,
            kaprog.nama_guru AS kepala_program,
            walas.nama_guru AS wali_kelas,
            ps.nip_guru AS nip_ps,
            kaprog.nip_guru AS nip_kaprog,
            walas.nip_guru AS nip_walas
          FROM pengajuan
          
          INNER JOIN perusahaan ON pengajuan.id_perusahaan = perusahaan.id_perusahaan
          LEFT JOIN kontak_perusahaan ON pengajuan.id_perusahaan = kontak_perusahaan.id_perusahaan
          INNER JOIN siswa ON pengajuan.nis = siswa.nis
          LEFT JOIN kelas ON siswa.id_kelas = kelas.id_kelas
          LEFT JOIN jurusan ON kelas.id_jurusan = jurusan.id_jurusan
          LEFT JOIN pembimbing_sekolah ON pengajuan.id_ps = pembimbing_sekolah.id_ps
          LEFT JOIN kepala_program ON pengajuan.id_kaprog = kepala_program.id_kaprog
          LEFT JOIN wali_kelas ON pengajuan.id_walas = wali_kelas.id_walas
          LEFT JOIN guru AS ps ON pembimbing_sekolah.id_guru = ps.id_guru
          LEFT JOIN guru AS kaprog ON kepala_program.id_guru = kaprog.id_guru
          LEFT JOIN guru AS walas ON wali_kelas.id_guru = walas.id_guru
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::unprepared('DROP VIEW view_print_pengajuan');
    }
};