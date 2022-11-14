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
        $this->table = 'kontak_perusahaan';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_perusahaan')->length(4)->nullable(false);
            $table->string('kontak_perusahaan')->length(60)->nullable(false);

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