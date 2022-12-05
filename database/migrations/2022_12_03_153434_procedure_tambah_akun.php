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
        CREATE OR REPLACE PROCEDURE procedure_tambah_akun (Level_user INT, Email VARCHAR(60), Password VARCHAR(60), Username VARCHAR(60), Nama VARCHAR(60), Identitas VARCHAR(20))
          BEGIN
            DECLARE idakun INT;
            DECLARE idguru INT;
            INSERT INTO akun (level_user,email,password,username) VALUES (Level_user, Email, Password, Username);
            SELECT id_akun INTO idakun FROM akun WHERE username=Username LIMIT 1;
            IF(Level_user=1) THEN
              INSERT INTO guru (id_akun,nip_guru,nama_guru) VALUES (idakun, Identitas, Nama);
              SELECT id_guru INTO idguru FROM guru WHERE id_akun=idakun LIMIT 1;
              INSERT INTO staff_hubin (id_guru) VALUES (idguru);
            ELSEIF(Level_user=2) THEN
              INSERT INTO guru (id_akun,nip_guru,nama_guru) VALUES (idakun, Identitas, Nama);
              SELECT id_guru INTO idguru FROM guru WHERE id_akun=idakun LIMIT 1;
              INSERT INTO kepala_program (id_guru) VALUES (idguru);
            ELSEIF(Level_user=3) THEN
              INSERT INTO guru (id_akun,nip_guru,nama_guru) VALUES (idakun, Identitas, Nama);
              SELECT id_guru INTO idguru FROM guru WHERE id_akun=idakun LIMIT 1;
              INSERT INTO wali_kelas (id_guru) VALUES (idguru);
            ELSEIF(Level_user=4) THEN
              INSERT INTO guru (id_akun,nip_guru,nama_guru) VALUES (idakun, Identitas, Nama);
              SELECT id_guru INTO idguru FROM guru WHERE id_akun=idakun LIMIT 1;
              INSERT INTO pembimbing_sekolah (id_guru) VALUES (idguru);
            ELSEIF(Level_user=5) THEN
              INSERT INTO pembimbing_perusahaan (nik_pp,id_akun,nama_pp) VALUES (Identitas,idakun,Nama);
            ELSE
              INSERT INTO siswa (nis,id_akun,nama_siswa) VALUES (Identitas,idakun,Nama);
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