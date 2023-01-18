<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffhubinController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PrakerinController;
use App\Http\Controllers\PembimbingsekolahController;
use App\Http\Controllers\KepalaprogramController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
  return redirect('/hubin');
});

// Route::get('/login', [loginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [StaffhubinController::class, 'index']);

// ->middleware('hubin')

// Route Modul Monitoring
Route::get('/monitoring', [PembimbingsekolahController::class, 'monitoring']);
Route::get('/monitoring/edit/{id_monitoring}', [PembimbingsekolahController::class, 'editmonitoring']);
Route::post('/monitoring/update', [PembimbingsekolahController::class, 'updatemonitoring']);
Route::post('/monitoring/hapus', [PembimbingsekolahController::class, 'destroymonitoring']);

// Route Modul Pilih Pembimbing Sekolah
Route::get('/pilihpembimbingsekolah', [KepalaprogramController::class, 'indexps']);
Route::get('/pilihpembimbingsekolah/edit/{id_prakerin}', [KepalaprogramController::class, 'editps']);
Route::post('/pilihpembimbingsekolah/edit/update', [KepalaprogramController::class, 'updateps']);

// Route Modul Surat Pengajuan
Route::get('/suratpengajuan', [KepalaprogramController::class, 'indexsuratpengajuan']);
Route::get('/suratpengajuan/detail/{id_pengajuan}', [KepalaprogramController::class, 'detailsuratpengajuan']);
Route::post('/suratpengajuan/detail/terimapengajuan/{id_pengajuan}', [KepalaprogramController::class, 'updateterima']);
Route::post('/suratpengajuan/detail/tolakpengajuan/{id_pengajuan}', [KepalaprogramController::class, 'updatetolak']);
Route::post('/suratpengajuan/hapus/{id_pengajuan}', [KepalaprogramController::class, 'hapussuratpengajuan']);

// Route Modul Presensi Siswa
Route::get('/presensisiswa', [PembimbingsekolahController::class, 'index']);

//Routes Fitur Penilaian Siswa
Route::get('/penilaian', [PenilaianController::class, 'index']);
Route::get('/getKompetensi', [PenilaianController::class, 'getKompetensi'])->name('getKompetensi');
Route::post('/simpan_nilai',[PenilaianController::class,'simpan']);
Route::get('/nilai/edit/{id}',[PenilaianController::class,'edit']);
Route::post('/nilai/edit/update',[PenilaianController::class,'update']);
//Routes Fitur Presensi Siswa
Route::get('/presensi', [PresensisiswaController::class, 'index']);
Route::get('/get-kompetensi', [PresensisiswaController::class, 'getPp'])->name('getPp');
Route::post('/simpan',[PresensisiswaController::class,'simpan']);
Route::get('/edit/{id}',[PresensisiswaController::class,'edit']);
Route::put('/update_presensi',[PresensisiswaController::class,'update']);

Route::get('/hubin', [StaffhubinController::class, 'index'])->name('hubin');
Route::resource('/hubin/leveluser', AkunController::class)->parameters(['leveluser' => 'akun']);

Route::resource('/siswa/pengajuan', PengajuanController::class);

Route::get('/hubin/listsiswa', function() {
  return view('dashboard.hubin.list_siswa');
})->name('hubin.listsiswa');
