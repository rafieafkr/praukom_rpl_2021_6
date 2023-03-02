<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    protected $table;
    function __construct()
    {
        $this->table = 'log_pengajuan';
    }

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->tinyInteger('id_log_pengajuan')->autoIncrement();
            $table->string('aksi')->length(30)->nullable(false);
            $table->tinyInteger('id_pengajuan')->length(4);
            $table->string('nis')->length(15);
            $table->dateTime('waktu');
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