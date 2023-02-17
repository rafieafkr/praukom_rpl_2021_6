<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbingsekolah extends Model
{
    use HasFactory;
    protected $table = 'pembimbing_sekolah';
    protected $primaryKey = 'id_ps';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nip_guru','id_akun','nama_ps'];

    public function monitoring()
    {
        return $this->belongsTo(Monitoring::class, 'id_ps','id_ps');
    }

    public function prakerin()
    {
        return $this->belongsTo(Prakerin::class, 'id_ps', 'id_ps');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_ps', 'id_ps');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}