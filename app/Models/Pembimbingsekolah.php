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
}