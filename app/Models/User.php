<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $table = 'akun';
    // protected $primaryKey = 'id_akun';

    protected $fillable = [
        'level_user',
        'email',
        'username',
        'password',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function leveluser()
    {
        return $this->hasOne(Leveluser::class, 'id_level', 'level_user');
    }

    public function guru()
    {
        return $this->hasOne(Guru::class, 'id_akun', 'id');
    }

    public function pembimbingperusahaan()
    {
        return $this->hasOne(Pembimbingperusahaan::class, 'id_akun', 'id');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id_akun', 'id');
    }
}