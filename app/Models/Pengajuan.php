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
    protected $fillable = ['nis','id_perusahaan','id_kaprog','id_walas','id_ps','id_staff','status_pengajuan','bukti_terima'];
}