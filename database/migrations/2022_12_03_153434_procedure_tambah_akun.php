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
        CREATE OR REPLACE PROCEDURE procedure_tambah_akun (nLevel_user INT, nEmail VARCHAR(60), nPassword VARCHAR(60), nUsername VARCHAR(60), nNama VARCHAR(60), nIdentitas VARCHAR(20))
          BEGIN
            DECLARE idakun INT;
            DECLARE idguru INT;
            INSERT INTO akun (level_user,email,password,username) VALUES (nLevel_user, nEmail, nPassword, nUsername);
            SELECT id INTO idakun FROM akun WHERE username=nUsername;
            IF(nLevel_user=1) THEN
              INSERT INTO guru (id_akun,nip_guru,nama_guru) VALUES (idakun, nIdentitas, nNama);
              SELECT id_guru INTO idguru FROM guru WHERE id_akun=idakun;
              INSERT INTO staff_hubin (id_guru) VALUES (idguru);
            ELSEIF(nLevel_user=2) THEN
              INSERT INTO guru (id_akun,nip_guru,nama_guru) VALUES (idakun, nIdentitas, nNama);
              SELECT id_guru INTO idguru FROM guru WHERE id_akun=idakun;
              INSERT INTO kepala_program (id_guru) VALUES (idguru);
            ELSEIF(nLevel_user=3) THEN
              INSERT INTO guru (id_akun,nip_guru,nama_guru) VALUES (idakun, nIdentitas, nNama);
              SELECT id_guru INTO idguru FROM guru WHERE id_akun=idakun;
              INSERT INTO wali_kelas (id_guru) VALUES (idguru);
            ELSEIF(nLevel_user=4) THEN
              INSERT INTO guru (id_akun,nip_guru,nama_guru) VALUES (idakun, nIdentitas, nNama);
              SELECT id_guru INTO idguru FROM guru WHERE id_akun=idakun;
              INSERT INTO pembimbing_sekolah (id_guru) VALUES (idguru);
            ELSEIF(nLevel_user=5) THEN
              INSERT INTO pembimbing_perusahaan (nik_pp,id_akun,nama_pp) VALUES (nIdentitas,idakun,nNama);
            ELSE
              INSERT INTO siswa (nis,id_akun,nama_siswa) VALUES (nIdentitas,idakun,nNama);
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
        DB::unprepared('DROP PROCEDURE procedure_tambah_akun');
    }
};