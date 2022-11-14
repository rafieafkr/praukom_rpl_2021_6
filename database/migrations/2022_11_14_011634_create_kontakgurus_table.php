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
        $this->table = 'kontak_guru';
    }

    //menentukan isi tabel
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->engine = 'innodb';
            $table->string('nip_guru',20)->nullable(false);
            $table->string('kontak',17)->nullable(false);

            $table->foreign('nip_guru')->references('nip_guru')->on('guru')->cascadeOnDelete();
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
