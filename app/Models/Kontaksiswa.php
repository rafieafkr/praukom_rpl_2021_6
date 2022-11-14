<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontaksiswa extends Model
{
    use HasFactory;
    protected $table = 'kontak_siswa';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nis','kontak'];
}