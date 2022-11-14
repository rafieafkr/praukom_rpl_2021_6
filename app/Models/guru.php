<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'nip_guru';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['nip_guru','nama'];
}