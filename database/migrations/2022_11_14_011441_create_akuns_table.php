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
        $this->table = 'akun';
    }

    //menentukan isi tabel
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->tinyInteger('id_akun')->length(4)->autoIncrement();
            $table->tinyInteger('level_user')->length(3)->nullable(false);
            $table->string('email',60)->nullable(false);
            $table->string('password',60)->nullable(false);
            $table->string('username',60)->nullable(false);
            
            $table->foreign('level_user')->references('id_level')->on('level_user')->cascadeOnDelete();

        });

        // Schema::table($this->table, function (Blueprint $table) {
        //     $table->integer('level_user', 8)->change();

        // });

        // Schema::create($this->table, function (Blueprint $table) {
        //     $table->engine = 'innodb';
        //     $table->foreign('level_user')->references('id_level')->on('level_user')->cascadeOnDelete();

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    // kalo sudah ada akan didrop
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
};
