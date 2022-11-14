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
            $table->tinyInteger('id_presensi')->length(4)->autoIncrement()->nullable(false);
            $table->string('nik_pp')->length(17)->nullable(false);
            $table->string('nis')->length(15)->nullable(false);
            $table->date('tgl_kehadiran')->nullable(false);
            $table->text('keterangan')->nullable(false);
            $table->time('jam_masuk')->nullable(false);
            $table->time('jam_keluar')->nullable(false);
            $table->text('kegiatan')->nullable(false);
            $table->string('status_hadir')->length(20)->nullable(false);

            $table->foreign('nis')->references('nis')->on('siswa')->cascadeOnDelete();
            $table->foreign('nik_pp')->references('nik_pp')->on('pembimbing_perusahaan')->cascadeOnDelete();
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
