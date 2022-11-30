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
        $this->table = 'kepala_program';
    }
    

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_kaprog')->length(4)->autoIncrement();
            $table->string('nip_guru')->length(20)->nullable(false);
            $table->tinyInteger('id_akun')->length(4)->nullable(false);
            $table->string('nama_kaprog')->length(60)->nullable(false);
            $table->string('foto_kaprog')->length(255)->nullable();
            
            $table->foreign('nip_guru')->references('nip_guru')->on('guru')->cascadeOnDelete();
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