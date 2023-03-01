<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //menentukan nama tabel
    protected $table;
    function __construct()
    {
        $this->table = 'presensi_siswa';
    }

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->integer('id_presensi')->length(11)->autoIncrement()->nullable(false);
            $table->string('nik_pp')->length(17)->nullable(false);
            $table->string('nis')->length(15)->nullable(false);
            $table->date('tgl_kehadiran')->nullable(false);
            $table->text('keterangan')->nullable();
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->text('kegiatan')->nullable();
            $table->string('status_hadir')->length(20)->default(0)->nullable(false);
            $table->string('foto_selfie')->length(255)->nullable();

            $table->foreign('nis')->references('nis')->on('siswa')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nik_pp')->references('nik_pp')->on('pembimbing_perusahaan')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
};