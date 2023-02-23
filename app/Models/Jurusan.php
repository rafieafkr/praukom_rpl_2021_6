<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['kepala_jurusan','nama_jurusan','akronim'];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id_jurusan', 'id_jurusan');
    }

    public function kepalaprogram()
    {
        return $this->belongsTo(Kepalaprogram::class, 'kepala_jurusan', 'id_kaprog');
    }
}