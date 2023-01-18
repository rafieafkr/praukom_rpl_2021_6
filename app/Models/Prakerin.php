<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prakerin extends Model
{
    use HasFactory;
    protected $table = 'prakerin';
    protected $primaryKey = 'id_prakerin';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nis','nik_pp','id_ps','id_kaprog','id_perusahaan'];

    public function kepalaprogram()
    {
        return $this->hasMany(Kepalaprogram::class, 'id_kaprog', 'id_kaprog');
    }

    public function perusahaan()
    {
        return $this->hasMany(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function pembimbingsekolah()
    {
        return $this->hasMany(Pembimbingsekolah::class, 'id_ps', 'id_ps');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'nis', 'nis');
    }
}