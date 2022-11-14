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
        $this->table = 'pembimbing_sekolah';
    } 
    
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->tinyInteger('id_ps')->length(4)->autoIncrement();
            $table->string('nip_guru')->length(20)->nullable(false);
            $table->tinyInteger('id_akun')->length(4)->nullable(false);
            $table->string('nama_ps')->length(60)->nullable(false);

            $table->foreign('nip_guru')->references('nip_guru')->on('guru')->cascadeOnDelete();
            $table->foreign('id_akun')->references('id_akun')->on('akun')->cascadeOnDelete();

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