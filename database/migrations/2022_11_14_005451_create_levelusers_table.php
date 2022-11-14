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
        $this->table = 'level_user';
    }
    
    //menentukan isi tabel
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->tinyInteger('id_level')->autoIncrement();
            $table->string('nama_level',30)->nullable(false);
            $table->text('keterangan')->nullable();
        });

        // Schema::table($this->table, function (Blueprint $table) {
        //     $table->integer('id_level', 3)->change();

        // });
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
