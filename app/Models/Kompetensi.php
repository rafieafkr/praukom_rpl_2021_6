<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    use HasFactory;
    protected $table = 'kompetensi';
    protected $primaryKey = 'id_kompetensi';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['id_jurusan','nama_kompetensi'];
}
