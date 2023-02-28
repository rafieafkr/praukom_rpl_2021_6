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
    protected $fillable = ['id_guru','jabatan'];

    public function monitoring()
    {
        return $this->belongsTo(Monitoring::class, 'id_kepsek', 'id_kepsek');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}