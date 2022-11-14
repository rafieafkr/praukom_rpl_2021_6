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
        $this->table = 'guru';
    }

    //menentukan isi tabel
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->string('nip_guru',20)->primary();
            $table->string('nama_guru',60)->nullable(false);
        });
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
