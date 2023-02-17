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

    public function user()
    {
        return $this->belongsTo(User::class, 'level_user', 'id_level');
    }
}