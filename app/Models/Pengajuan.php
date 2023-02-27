<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['id_pengajuan','nis','id_perusahaan','id_kaprog','id_walas','id_ps','id_staff','status_pengajuan','bukti_terima'];

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

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nis', 'nis');
    }

    public function walikelas()
    {
        return $this->hasOne(Walikelas::class, 'id_walas', 'id_walas');
    }

    public function staffhubin()
    {
        return $this->hasOne(Staffhubin::class, 'id_staff', 'id_staff');
    }
}