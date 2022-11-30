<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leveluser extends Model
{
    use HasFactory;
    protected $table = 'level_user';
    protected $primaryKey = 'id_level';
    protected $softDelete = false;
    public $timestamps = false;

    public function staff_hubin()
    {
        return $this->belongsTo(Leveluser::class, 'id_akun');
    }
}