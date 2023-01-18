<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepalasekolah extends Model
{
    use HasFactory;
    protected $table = 'kepala_sekolah';
    protected $primaryKey = 'id_kepsek';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nip_guru','nama_kepsek','jabatan'];

    public function monitoring()
    {
        return $this->belongsTo(Monitoring::class, 'id_kepsek', 'id_kepsek');
    }
}