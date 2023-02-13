<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffhubinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [MainController::class, 'index']);
Route::post('/dashboard/gantifoto/{id}', [MainController::class, 'gantifoto']);

// ->middleware('hubin')

// Route Modul Monitoring
Route::get('/monitoring', [PembimbingsekolahController::class, 'monitoring']);
Route::get('/monitoring/edit/{id_monitoring}', [PembimbingsekolahController::class, 'editmonitoring']);
Route::post('/monitoring/update', [PembimbingsekolahController::class, 'updatemonitoring']);
Route::post('/monitoring/hapus', [PembimbingsekolahController::class, 'destroymonitoring']);

// Route Modul Pilih Pembimbing Sekolah
Route::get('/pilihpembimbingsekolah', [KepalaprogramController::class, 'indexps']);
Route::get('/pilihpembimbingsekolah/show', [KepalaprogramController::class, 'carips']);
Route::get('/pilihpembimbingsekolah/edit/{id_prakerin}', [KepalaprogramController::class, 'editps']);
Route::post('/pilihpembimbingsekolah/edit/update', [KepalaprogramController::class, 'updateps']);

// Route Modul Surat Pengajuan
Route::get('/suratpengajuan', [KepalaprogramController::class, 'indexsuratpengajuan']);
Route::get('/suratpengajuan/show', [KepalaprogramController::class, 'carisuratpengajuan']);
Route::get('/suratpengajuan/detail/{id_pengajuan}', [KepalaprogramController::class, 'detailsuratpengajuan']);
Route::post('/suratpengajuan/detail/terimapengajuan/{id_pengajuan}', [KepalaprogramController::class, 'updateterima']);
Route::post('/suratpengajuan/detail/tolakpengajuan/{id_pengajuan}', [KepalaprogramController::class, 'updatetolak']);
Route::post('/suratpengajuan/hapus/{id_pengajuan}', [KepalaprogramController::class, 'hapussuratpengajuan']);

// Route Modul Presensi Siswa
Route::get('/presensisiswa', [PembimbingsekolahController::class, 'presensi']);
// Route Modul Data Prakerin
Route::get('/dataprakerin', [PembimbingsekolahController::class, 'dataprakerin']);
Route::get('/dataprakerin/show', [PembimbingsekolahController::class, 'cariprakerin']);
Route::get('/dataprakerin/detail/{id_prakerin}', [PembimbingsekolahController::class, 'detailprakerin']);


Route::get('/listsiswa', function() {
  return view('hubin.list_siswa');
});