<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $softDelete = false;
    public $timestamps = false;
    protected $fillable = ['id_akun','nip_guru','nama_guru'];

    public function kepalaprogram()
    {
        return $this->hasOne(Kepalaprogram::class, 'id_guru', 'id_guru');
    }

    public function pembimbingsekolah()
    {
        return $this->hasOne(Pembimbingsekolah::class, 'id_guru', 'id_guru');
    }

    public function walikelas()
    {
        return $this->hasOne(Walikelas::class, 'id_guru', 'id_guru');
    }

    public function staffhubin()
    {
        return $this->hasOne(Staffhubin::class, 'id_guru', 'id_guru');
    }

    public function kepalasekolah()
    {
        return $this->hasOne(Kepalasekolah::class, 'id_guru', 'id_guru');
    }

    public function akun()
    {
        return $this->belongsTo(User::class, 'id_akun', 'id');
    }

    public function kontak_guru()
    {
        return $this->belongsTo(Kontakguru::class, 'id_guru', 'id_guru');
    }
}