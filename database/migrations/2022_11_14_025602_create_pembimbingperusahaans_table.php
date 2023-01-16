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
        $this->table = 'pembimbing_perusahaan';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->string('nik_pp')->length(20)->nullable(false)->primary();
            $table->tinyInteger('id_akun')->length(4)->nullable(false);
            $table->string('nama_pp')->length(60)->nullable(false);
            $table->string('foto_pp')->length(255)->nullable();

            $table->foreign('id_akun')->references('id')->on('akun')->cascadeOnDelete();
            // $table->foreign('id_akun')->references('id_akun')->on('akun')->cascadeOnDelete();

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