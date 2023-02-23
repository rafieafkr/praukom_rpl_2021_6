<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepalaprogram extends Model
{
    use HasFactory;
    protected $table = 'kepala_program';
    protected $primaryKey = 'id_kaprog';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['id_guru'];

    public function prakerin()
    {
        return $this->belongsTo(Prakerin::class, 'id_kaprog', 'id_kaprog');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_kaprog', 'id_kaprog');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function jurusan()
    {
        return $this->hasOne(Jurusan::class, 'kepala_jurusan', 'id_kaprog');
    }
}