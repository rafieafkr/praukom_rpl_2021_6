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
        DB::unprepared('
        CREATE OR REPLACE PROCEDURE procedure_update_akun (nId_akun INT, nLevel_user INT, nEmail VARCHAR(60), nPassword VARCHAR(60), nUsername VARCHAR(60), nNama VARCHAR(60), nIdentitas VARCHAR(20))
          BEGIN
            DECLARE idguru INT;
            UPDATE akun SET level_user=nLevel_user, email=nEmail, password=nPassword, username=nUsername WHERE id_akun=nId_akun;
            SELECT id_guru INTO idguru FROM guru WHERE id_akun=nId_akun;
            IF(nLevel_user = 1) THEN
              UPDATE guru SET nip_guru=nIdentitas, nama_guru=nNama;
              INSERT INTO staff_hubin (id_guru) VALUES (idguru)
              ON DUPLICATE KEY UPDATE id_guru=idguru;
            ELSEIF(nLevel_user = 2) THEN
              UPDATE guru SET nip_guru=nIdentitas, nama_guru=nNama;
              INSERT INTO kepala_program (id_guru) VALUES (idguru)
              ON DUPLICATE KEY UPDATE id_guru=idguru;
            ELSEIF(nLevel_user = 3) THEN
              UPDATE guru SET nip_guru=nIdentitas, nama_guru=nNama;
              INSERT INTO wali_kelas (id_guru) VALUES (idguru)
              ON DUPLICATE KEY UPDATE id_guru=idguru;
            ELSEIF(nLevel_user = 4) THEN
              UPDATE guru SET nip_guru=nIdentitas, nama_guru=nNama;
              INSERT INTO pembimbing_sekolah (id_guru) VALUES (idguru)
              ON DUPLICATE KEY UPDATE id_guru=idguru;
            ELSEIF(nLevel_user = 5) THEN
              INSERT INTO pembimbing_perusahaan (id_akun, nik_pp, nama_pp) VALUES (nId_akun, nIdentitas, nNama) 
              ON DUPLICATE KEY UPDATE nik_pp=nIdentitas, nama_pp=nNama;
            ELSE
              INSERT INTO siswa (id_akun, nis, nama_siswa) VALUES (nId_akun, nIdentitas, nNama) 
              ON DUPLICATE KEY UPDATE nis=nIdentitas, nama_siswa=nNama;
            END IF;
          END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE procedure_update_akun');
    }
};