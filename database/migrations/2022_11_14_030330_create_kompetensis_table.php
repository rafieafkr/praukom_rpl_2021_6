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
        $this->table = 'kompetensi';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_kompetensi')->length(4)->autoIncrement()->nullable(false);
            $table->tinyInteger('id_jurusan')->length(15)->nullable(false);
            $table->string('nama_kompetensi')->length(60)->nullable(false);
    
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->cascadeOnDelete();
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