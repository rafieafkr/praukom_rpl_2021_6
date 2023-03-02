<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;
    protected $table = 'monitoring';
    protected $primaryKey = 'id_monitoring';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['id_monitoring','id_ps','id_kepsek','id_perusahaan','tanggal','resume','verifikasi'];

    public function pembimbingsekolah()
    {
        return $this->hasOne(Pembimbingsekolah::class, 'id_ps','id_ps');
    }

    public function perusahaan()
    {
        return $this->hasOne(Perusahaan::class, 'id_perusahaan','id_perusahaan');
    }

    public function kepalasekolah()
    {
        return $this->hasOne(Kepalasekolah::class, 'id_kepsek','id_kepsek');
    }
}