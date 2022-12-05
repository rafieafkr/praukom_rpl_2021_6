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
        $this->table = 'pengajuan';
    }

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->tinyInteger('id_pengajuan')->length(4)->autoIncrement()->nullable(false);
            $table->string('nis')->length(15)->nullable(false);
            $table->tinyInteger('id_perusahaan')->length(4)->nullable(false);
            $table->tinyInteger('id_kaprog')->length(4)->nullable(false);
            $table->tinyInteger('id_walas')->length(4)->nullable(false);
            $table->tinyInteger('id_ps')->length(4)->nullable(false);
            $table->tinyInteger('id_staff')->length(4)->nullable(false);
            $table->string('status_pengajuan')->length(20)->nullable(false);
            $table->string('bukti_terima')->lengt(60)->nullable(false);

            $table->foreign('nis')->references('nis')->on('siswa')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_kaprog')->references('id_kaprog')->on('kepala_program')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_walas')->references('id_walas')->on('wali_kelas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_ps')->references('id_ps')->on('pembimbing_sekolah')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('id_staff')->references('id_staff')->on('staff_hubin')->cascadeOnDelete()->cascadeOnUpdate();
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