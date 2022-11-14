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
        $this->table = 'kepala_sekolah';
    }
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_kepsek')->length(4)->autoIncrement();
            $table->string('nip_guru')->length(20)->nullable(false);
            $table->string('nama_kepsek')->length(60)->nullable(false);
            $table->string('jabatan')->length(30)->nullable(false);

            $table->foreign('nip_guru')->references('nip_guru')->on('guru')->cascadeOnDelete();
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
