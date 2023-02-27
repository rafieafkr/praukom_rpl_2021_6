<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sikap extends Model
{
    use HasFactory;
    protected $table = 'sikap';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = [ 'id_penilaian',
                            'disiplin_waktu',
                            'kemauan_kerja_dan_motivasi',
                            'kualitas_kerja',
                            'inisiatif_kerja',
                            'perilaku'];
}