<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['id_penilaian','nis','nik_pp'];
}