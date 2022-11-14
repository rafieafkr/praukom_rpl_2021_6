<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    use HasFactory;
    protected $table = 'angkatan';
    protected $primaryKey = 'id_angkatan';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['angkatan'];
}