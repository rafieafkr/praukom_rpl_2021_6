<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['id_walas','id_jurusan','id_angkatan','nama_kelas','tingkat_kelas'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan', 'id_angkatan');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id_kelas', 'id_kelas');
    }
}