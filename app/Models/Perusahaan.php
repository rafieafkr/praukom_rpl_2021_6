<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nama_perusahaan','alamat_perusahaan'];

    public function prakerin()
    {
        return $this->belongsTo(Prakerin::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function monitoring()
    {
        return $this->belongsTo(Monitoring::class, 'id_perusahaan', 'id_perusahaan');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_perusahaan', 'id_perusahaan');
    }
}