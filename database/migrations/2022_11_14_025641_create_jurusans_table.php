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
        $this->table = 'jurusan';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_jurusan')->length(4)->autoIncrement();
            $table->tinyInteger('kepala_jurusan')->length(4)->nullable(false);
            $table->string('nama_jurusan')->length(30)->nullable(false);
            $table->string('akronim')->length(5)->nullable(false);

            $table->foreign('kepala_jurusan')->references('id_kaprog')->on('kepala_program')->cascadeOnDelete();

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