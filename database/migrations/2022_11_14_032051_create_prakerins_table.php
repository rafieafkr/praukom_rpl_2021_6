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
        $this->table = 'prakerin';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_prakerin')->length(4)->autoIncrement();
            $table->string('nis')->length(15)->nullable(false);
            $table->string('nik_pp')->length(17)->nullable(false);
            $table->tinyInteger('id_ps')->length(4)->nullable(false);
            $table->tinyInteger('id_kaprog')->length(4)->nullable(false);
            $table->tinyInteger('id_perusahaan')->length(4)->nullable(false);

            $table->foreign('nis')->references('nis')->on('siswa')->cascadeOnDelete();
            $table->foreign('nik_pp')->references('nik_pp')->on('pembimbing_perusahaan')->cascadeOnDelete();
            $table->foreign('id_ps')->references('id_ps')->on('pembimbing_sekolah')->cascadeOnDelete();
            $table->foreign('id_kaprog')->references('id_kaprog')->on('kepala_program')->cascadeOnDelete();
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