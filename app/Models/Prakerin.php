<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prakerin extends Model
{
    use HasFactory;
    protected $table = 'prakerin';
    protected $primaryKey = 'id_prakerin';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nis','nik_pp','id_ps','id_kaprog','id_perusahaan'];
}
