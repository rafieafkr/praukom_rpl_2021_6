<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensisiswa extends Model
{
    use HasFactory;
    protected $table = 'presensi_siswa';
    protected $primaryKey = 'id_presensi';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nik_pp','nis','tgl_kehadiran','keterangan','jam_masuk','jam_keluar','kegiatan','status_hadir'];
}
