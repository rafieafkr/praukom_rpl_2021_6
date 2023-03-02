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
    protected $fillable = ['nis','nik_pp','id_ps','id_kaprog','id_perusahaan','status'];

    public function kepalaprogram()
    {
        return $this->hasOne(Kepalaprogram::class, 'id_kaprog', 'id_kaprog');
    }

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function pembimbingsekolah()
    {
        return $this->hasOne(Pembimbingsekolah::class, 'id_ps', 'id_ps');
    }

    public function pembimbingperusahaan()
    {
        return $this->hasOne(Pembimbingperusahaan::class, 'nik_pp', 'nik_pp');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nis', 'nis');
    }
}