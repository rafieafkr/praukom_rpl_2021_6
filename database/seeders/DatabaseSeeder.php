<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Kepalaprogram;
use App\Models\Kepalasekolah;
use App\Models\Leveluser;
use App\Models\Walikelas;
use App\Models\Kelas;
use App\Models\Pembimbingperusahaan;
use App\Models\Pembimbingsekolah;
use App\Models\Pengajuan;
use App\Models\Perusahaan;
use App\Models\Siswa;
use App\Models\Staffhubin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

// +----------------------------------------------------------+

// Perusahaan

        Perusahaan::create([
            'nama_perusahaan' => 'PT Bongkar Turret',
            'alamat_perusahaan' => 'Jalan Land of Dawn No.36 RT. 006 RW. 011'
        ]);

        Perusahaan::create([
            'nama_perusahaan' => 'PT So Hard To',
            'alamat_perusahaan' => 'Jalan Otoriter No.1998'
        ]);

// +----------------------------------------------------------+
        
// Guru

        Guru::create([
            'nip_guru' => 3011202201,
            'nama_guru' => "Parjo"
        ]);

        Guru::create([
            'nip_guru' => 3011202202,
            'nama_guru' => "Joko"
        ]);

        Guru::create([
            'nip_guru' => 3011202203,
            'nama_guru' => "Robo"
        ]);

        Guru::create([
            'nip_guru' => 3011202204,
            'nama_guru' => "Gojo"
        ]);

        Guru::create([
            'nip_guru' => 3011202205,
            'nama_guru' => "Yowo"
        ]);

        Guru::create([
            'nip_guru' => 3011202206,
            'nama_guru' => "Karto"
        ]);

        Guru::create([
            'nip_guru' => 3011202207,
            'nama_guru' => "Tomo"
        ]);

        Guru::create([
            'nip_guru' => 3011202208,
            'nama_guru' => "Pato"
        ]);

        Guru::create([
            'nip_guru' => 3011202209,
            'nama_guru' => "Noto"
        ]);

        Guru::create([
            'nip_guru' => 3011202210,
            'nama_guru' => "Loco"
        ]);

        Guru::create([
            'nip_guru' => 3011202211,
            'nama_guru' => "Hulo"
        ]);

        Guru::create([
            'nip_guru' => 3011202212,
            'nama_guru' => "Toyo"
        ]);

        Guru::create([
            'nip_guru' => 3011202213,
            'nama_guru' => "Tamo"
        ]);

        Guru::create([
            'nip_guru' => 3011202214,
            'nama_guru' => "Mayo"
        ]);

        Guru::create([
            'nip_guru' => 3011202215,
            'nama_guru' => "Rayo"
        ]);

        Guru::create([
            'nip_guru' => 3011202216,
            'nama_guru' => "Pakjo"
        ]);

        Guru::create([
            'nip_guru' => 3011202217,
            'nama_guru' => "Yuto"
        ]);
        
// +----------------------------------------------------------+

// Angkatan

        Angkatan::create([
            'tahun' => 2018,
        ]);

        Angkatan::create([
            'tahun' => 2019,
        ]);

        Angkatan::create([
            'tahun' => 2020,
        ]);

        Angkatan::create([
            'tahun' => 2021,
        ]);

        Angkatan::create([
            'tahun' => 2022,
        ]);

// +----------------------------------------------------------+

// Level User

        Leveluser::create([
            'nama_level' => 'Super Admin',
            'keterangan' => 'kinoy ganteng sedunia'
        ]);

        Leveluser::create([
            'nama_level' => 'Staff Hubin',
            'keterangan' => 'kinoy ganteng sedunia'
        ]);

        Leveluser::create([
            'nama_level' => 'Kepala Program',
            'keterangan' => 'kinoy ganteng sedunia'
        ]);

        Leveluser::create([
            'nama_level' => 'Wali Kelas',
            'keterangan' => 'kinoy ganteng sedunia'
        ]);

        Leveluser::create([
            'nama_level' => 'Pembimbing Sekolah',
            'keterangan' => 'kinoy ganteng sedunia'
        ]);

        Leveluser::create([
            'nama_level' => 'Pembimbing Perusahaan',
            'keterangan' => 'kinoy ganteng sedunia'
        ]);

        Leveluser::create([
            'nama_level' => 'Siswa',
            'keterangan' => 'kinoy ganteng sedunia'
        ]);

// +----------------------------------------------------------+

// Kepala Sekolah

        Kepalasekolah::create([
            'nip_guru' => 3011202206,
            'nama_kepsek' => 'Karto',
            'jabatan' => 'Kepala Sekolah'
        ]);

// +----------------------------------------------------------+

// User
        User::create([
            'level_user' => 2,
            'username' => 'Parjo',
            'email' => 'hubin@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 3,
            'username' => 'Joko',
            'email' => 'kaprog1@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 4,
            'username' => 'Robo',
            'email' => 'walas1@gmail.com',
            'password' => bcrypt('password')
        ]);


        User::create([
            'level_user' => 5,
            'username' => 'Gojo',
            'email' => 'ps1@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 6,
            'username' => 'Yowo',
            'email' => 'pp1@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 7,
            'username' => 'Hono',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 3,
            'username' => 'Tomo',
            'email' => 'kaprog2@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 3,
            'username' => 'Pato',
            'email' => 'kaprog3@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 3,
            'username' => 'Noto',
            'email' => 'kaprog4@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 3,
            'username' => 'Loco',
            'email' => 'kaprog5@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 3,
            'username' => 'Hulo',
            'email' => 'kaprog6@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 3,
            'username' => 'Toyo',
            'email' => 'kaprog7@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 3,
            'username' => 'Tamo',
            'email' => 'kaprog8@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 4,
            'username' => 'Mayo',
            'email' => 'walas2@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 4,
            'username' => 'Rayo',
            'email' => 'walas3@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 4,
            'username' => 'Pakjo',
            'email' => 'walas4@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 4,
            'username' => 'Yuto',
            'email' => 'walas5@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'level_user' => 6,
            'username' => 'Wanto',
            'email' => 'pp2@gmail.com',
            'password' => bcrypt('password')
        ]);
       

// +----------------------------------------------------------+

// Kepala Program

        Kepalaprogram::create([
            'nip_guru' => 3011202202,
            'id_akun' => 2,
            'nama_kaprog' => 'Joko',
        ]);

        Kepalaprogram::create([
            'nip_guru' => 3011202207,
            'id_akun' => 7,
            'nama_kaprog' => 'Tomo',
        ]);

        Kepalaprogram::create([
            'nip_guru' => 3011202208,
            'id_akun' => 8,
            'nama_kaprog' => 'Pato',
        ]);

        Kepalaprogram::create([
            'nip_guru' => 3011202209,
            'id_akun' => 9,
            'nama_kaprog' => 'Noto',
        ]);

        Kepalaprogram::create([
            'nip_guru' => 3011202210,
            'id_akun' => 10,
            'nama_kaprog' => 'Loco',
        ]);

        Kepalaprogram::create([
            'nip_guru' => 3011202211,
            'id_akun' => 11,
            'nama_kaprog' => 'Hulo',
        ]);

        Kepalaprogram::create([
            'nip_guru' => 3011202212,
            'id_akun' => 12,
            'nama_kaprog' => 'Toyo',
        ]);

        Kepalaprogram::create([
            'nip_guru' => 3011202213,
            'id_akun' => 13,
            'nama_kaprog' => 'Tamo',
        ]);

// +----------------------------------------------------------+

// Jurusan

        Jurusan::create([
            'kepala_jurusan' => 1,
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'akronim' => 'RPL'
        ]);

        Jurusan::create([
            'kepala_jurusan' => 2,
            'nama_jurusan' => 'Akutansi',
            'akronim' => 'AK'
        ]);

        Jurusan::create([
            'kepala_jurusan' => 3,
            'nama_jurusan' => 'Teknik Kendaraan Ringan',
            'akronim' => 'TKR'
        ]);

        Jurusan::create([
            'kepala_jurusan' => 4,
            'nama_jurusan' => 'Teknik Pengelasan',
            'akronim' => 'TPL'
        ]);

        Jurusan::create([
            'kepala_jurusan' => 5,
            'nama_jurusan' => 'Teknik Pemesinan',
            'akronim' => 'TP'
        ]);

        Jurusan::create([
            'kepala_jurusan' => 6,
            'nama_jurusan' => 'Teknik Komputer Jaringan',
            'akronim' => 'TKJ'
        ]);  

        Jurusan::create([
            'kepala_jurusan' => 7,
            'nama_jurusan' => 'Multimedia',
            'akronim' => 'MM'
        ]);

        Jurusan::create([
            'kepala_jurusan' => 8,
            'nama_jurusan' => 'Busana Butik',
            'akronim' => 'BB'
        ]);

// +----------------------------------------------------------+

// Wali Kelas

        Walikelas::create([
            'nip_guru' => 3011202203,
            'id_akun' => 3,
            'nama_walas' => 'Robo',
        ]);

        Walikelas::create([
            'nip_guru' => 3011202214,
            'id_akun' => 14,
            'nama_walas' => 'Mayo',
        ]);

        Walikelas::create([
            'nip_guru' => 3011202215,
            'id_akun' => 15,
            'nama_walas' => 'Rayo',
        ]);

        Walikelas::create([
            'nip_guru' => 3011202216,
            'id_akun' => 16,
            'nama_walas' => 'Pakjo',
        ]);

        Walikelas::create([
            'nip_guru' => 3011202217,
            'id_akun' => 17,
            'nama_walas' => 'Yuto',
        ]);

// +----------------------------------------------------------+

// Kelas

        Kelas::create([
            'id_walas' => 1,
            'id_jurusan' => 1,
            'id_angkatan' => 5,
            'nama_kelas' => 'A',
            'tingkat_kelas' => 'XI'
        ]);

        Kelas::create([
            'id_walas' => 2,
            'id_jurusan' => 2,
            'id_angkatan' => 5,
            'nama_kelas' => 'A',
            'tingkat_kelas' => 'XI'
        ]);

        Kelas::create([
            'id_walas' => 3,
            'id_jurusan' => 4,
            'id_angkatan' => 5,
            'nama_kelas' => 'A',
            'tingkat_kelas' => 'XI'
        ]);

        Kelas::create([
            'id_walas' => 4,
            'id_jurusan' => 5,
            'id_angkatan' => 5,
            'nama_kelas' => 'A',
            'tingkat_kelas' => 'XI'
        ]);

        Kelas::create([
            'id_walas' => 5,
            'id_jurusan' => 7,
            'id_angkatan' => 5,
            'nama_kelas' => 'A',
            'tingkat_kelas' => 'XI'
        ]);

// +----------------------------------------------------------+

// Siswa

        Siswa::create([
            'nis' => 20210001,
            'id_akun' => 6,
            'jurusan' => 1,
            'id_kelas' => 1,
            'nama_siswa' => 'Hono',
            'tempat_lahir' => 'Jawa',
            'tanggal_lahir' => '2004-09-21',
            'foto_siswa' => ''
        ]);

       

// +----------------------------------------------------------+

// Pembimbing Perusahaan

        Pembimbingperusahaan::create([
            'nik_pp' => 2106200501,
            'id_akun' => 5,
            'nama_pp' => 'Yowo',
            'foto_pp' => ''
        ]);

        Pembimbingperusahaan::create([
            'nik_pp' => 2106200502,
            'id_akun' => 18,
            'nama_pp' => 'Wanto',
            'foto_pp' => ''
        ]);

// +----------------------------------------------------------+

// Hubin

        Staffhubin::create([
            'nip_guru' => 3011202201,
            'id_akun' => 1,
            'nama_staff' => 'Parjo',
            'foto_hubin' => ''
        ]);

// +----------------------------------------------------------+

// Pembimbing Sekolah

        Pembimbingsekolah::create([
            'nip_guru' => 3011202204,
            'id_akun' => 4,
            'nama_ps' => 'Gojo'
        ]);
    }
}