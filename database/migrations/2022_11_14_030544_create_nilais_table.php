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
        $this->table = 'nilai';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->tinyInteger('id_penilaian')->length(4)->nullable(false);
            $table->tinyInteger('kompetensi')->length(4)->nullable(false);
            $table->tinyInteger('nilai')->length(4)->nullable(false);
    
            $table->foreign('id_penilaian')->references('id_penilaian')->on('penilaian')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('kompetensi')->references('id_kompetensi')->on('kompetensi')->cascadeOnDelete()->cascadeOnUpdate();
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