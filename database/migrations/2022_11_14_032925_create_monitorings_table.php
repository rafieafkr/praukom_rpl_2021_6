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
        $this->table = 'monitoring';
    }

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_monitoring')->length(4)->autoIncrement()->nullable(false);
            $table->tinyInteger('id_ps')->length(4)->nullable(false);
            $table->tinyInteger('id_kepsek')->length(4)->nullable(false);
            $table->tinyInteger('id_perusahaan')->length(4)->nullable(false);
            $table->date('tanggal')->nullable(false);
            $table->text('resume')->nullable(false);
            $table->string('verifikasi')->length(20)->nullable(false);

            $table->foreign('id_ps')->references('id_ps')->on('pembimbing_sekolah')->cascadeOnDelete();
            $table->foreign('id_kepsek')->references('id_kepsek')->on('kepala_sekolah')->cascadeOnDelete();
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan')->cascadeOnDelete();
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