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
            $table->tinyInteger('id_penilaian')->length(4)->nullable(false);
            $table->tinyInteger('kompetensi')->length(4)->nullable(false);
            $table->tinyInteger('nilai')->length(4)->nullable(false);
    
            $table->foreign('id_penilaian')->references('id_penilaian')->on('penilaian')->cascadeOnDelete();
            $table->foreign('kompetensi')->references('id_kompetensi')->on('kompetensi')->cascadeOnDelete();
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