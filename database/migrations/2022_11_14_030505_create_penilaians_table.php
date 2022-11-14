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
        $this->table = 'penilaian';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_penilaian')->length(4)->autoIncrement()->nullable(false);
            $table->string('nis')->length(15)->nullable(false);
            $table->string('nik_pp')->length(17)->nullable(false);
    
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