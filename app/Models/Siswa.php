<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nis','jurusan','id_kelas','nama_walas','tempat_lahir','tanggal_lahir'];
}