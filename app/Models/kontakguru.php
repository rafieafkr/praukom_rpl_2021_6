<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontakguru extends Model
{
    use HasFactory;
    protected $table = 'kontak_guru';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['id_guru','kontak_guru'];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'id_guru', 'id_guru');
    }
}