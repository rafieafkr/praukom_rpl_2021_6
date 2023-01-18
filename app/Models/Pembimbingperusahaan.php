<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbingperusahaan extends Model
{
    use HasFactory;
    protected $table = 'pembimbing_perusahaan';
    protected $primaryKey = 'id_pp';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nik_pp','id_akun','nama_pp'];
}