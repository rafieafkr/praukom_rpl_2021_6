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
    protected $table;
    public function __construct()
    {
        $this->table = 'siswa';
    } 

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->string('nis')->primary()->length(15)->nullable(false);
            $table->tinyInteger('id_akun')->length(4)->nullable(false);
            $table->tinyInteger('jurusan')->length(4)->nullable(false);
            $table->tinyInteger('id_kelas')->length(4)->nullable(false);
            $table->string('nama_siswa')->length(60)->nullable(false);
            $table->string('tempat_lahir')->length(60)->nullable(false);
            $table->date('tanggal_lahir')->nullable(false);
            $table->string('foto_siswa')->length(255)->nullable();

            $table->foreign('id_akun')->references('id')->on('akun')->cascadeOnDelete();
            // $table->foreign('id_akun')->references('id_akun')->on('akun')->cascadeOnDelete();
            $table->foreign('jurusan')->references('id_jurusan')->on('jurusan')->cascadeOnDelete();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->cascadeOnDelete();
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