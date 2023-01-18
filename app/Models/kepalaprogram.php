<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepalaprogram extends Model
{
    use HasFactory;
    protected $table = 'kepala_program';
    protected $id_kaprog = 'id_akun';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nip_guru','id_akun','nama_kaprog'];

    public function prakerin()
    {
        return $this->belongsTo(Prakerin::class, 'id_kaprog', 'id_kaprog');
    }

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_kaprog', 'id_kaprog');
    }
}