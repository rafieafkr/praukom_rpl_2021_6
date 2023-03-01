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
        $this->table = 'sikap';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->tinyInteger('id_penilaian')->length(4)->nullable(false);
            $table->tinyInteger('disiplin_waktu')->length(4)->nullable(false);
            $table->tinyInteger('kemauan_kerja_dan_motivasi')->length(4)->nullable(false);
            $table->tinyInteger('kualitas_kerja')->length(4)->nullable(false);
            $table->tinyInteger('inisiatif_kerja')->length(4)->nullable(false);
            $table->tinyInteger('perilaku')->length(4)->nullable(false);
    
            $table->foreign('id_penilaian')->references('id_penilaian')->on('penilaian')->cascadeOnDelete()->cascadeOnUpdate();
            
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