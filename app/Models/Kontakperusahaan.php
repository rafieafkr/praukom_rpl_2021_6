<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontakperusahaan extends Model
{
    use HasFactory;
    protected $table = 'kontak_perusahaan';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['kontak_perusahaan'];
}
