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
            $table->engine = 'innodb';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->string('nis')->primary()->length(15)->nullable(false);
            $table->integer('id_akun')->nullable(false);
            $table->tinyInteger('jurusan')->length(4)->nullable(true);
            $table->tinyInteger('id_kelas')->length(4)->nullable(true);
            $table->string('nama_siswa')->length(60)->nullable(false);
            $table->string('tempat_lahir')->length(60)->nullable(true);
            $table->date('tanggal_lahir')->nullable(true);

            $table->foreign('id_akun')->references('id')->on('akun')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('jurusan')->references('id_jurusan')->on('jurusan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->cascadeOnDelete()->cascadeOnUpdate();
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