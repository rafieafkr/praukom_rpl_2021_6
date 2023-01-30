<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewLihatPengajuan extends Model
{
    use HasFactory;
    protected $table = 'view_lihat_pengajuan';

    public function scopeCari($query, $keyword)
    {
      if(isset($keyword) ? $keyword : false) {
        return $query->where('email', 'LIKE', '%'. $keyword . '%');
      };
    }
}