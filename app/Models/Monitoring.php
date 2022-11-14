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
    protected $fillable = ['id_monitoring','id_ps','id_kelas','id_perusahaan','tanggal','resume','verifikasi'];
}
