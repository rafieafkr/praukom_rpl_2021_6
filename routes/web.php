<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffhubinController;
use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PrakerinController;
use App\Http\Controllers\PembimbingsekolahController;
use App\Http\Controllers\KepalaprogramController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PresensisiswaController;

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

/*------------------------------------- Route Login --------------------------------------*/

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/hack', [LoginController::class, 'hack']);

/*----------------------------------------------------------------------------------------*/



/*----------------------------------- Route Dashboard ------------------------------------*/

Route::get('/dashboard', [MainController::class, 'index']);
Route::post('/dashboard/gantifoto/{id}', [MainController::class, 'uploadfoto']);

/*----------------------------------------------------------------------------------------*/



/*-------------------------------- Route Modul Monitoring --------------------------------*/

Route::get('/monitoring', [MonitoringController::class, 'monitoring']);
Route::get('/monitoring/edit/{id_monitoring}', [MonitoringController::class, 'editmonitoring']);
Route::post('/monitoring/update', [MonitoringController::class, 'updatemonitoring']);
Route::post('/monitoring/hapus', [MonitoringController::class, 'destroymonitoring']);

/*----------------------------------------------------------------------------------------*/



/*------------------------ Route Modul Pilih Pembimbing Sekolah ---------------------------*/

Route::group(['middleware' => ['auth','level:Kepala Program']], function() {
  Route::get('/pilihpembimbingsekolah', [KepalaprogramController::class, 'indexps'])->middleware('auth');
  Route::get('/pilihpembimbingsekolah/show', [KepalaprogramController::class, 'carips'])->middleware('auth');
  Route::get('/pilihpembimbingsekolah/edit/{id_prakerin}', [KepalaprogramController::class, 'editps'])->middleware('auth');
  Route::post('/pilihpembimbingsekolah/edit/update', [KepalaprogramController::class, 'updateps'])->middleware('auth');
});

/*----------------------------------------------------------------------------------------*/



/*----------------------------- Route Modul Surat Pengajuan ------------------------------*/

Route::group(['middleware' => ['auth','level:Staff Hubin,Kepala Program,Wali Kelas']], function() {
  Route::get('/suratpengajuan', [PengajuanController::class, 'indexsuratpengajuan'])->middleware('auth');
  Route::get('/suratpengajuan/show', [PengajuanController::class, 'carisuratpengajuan'])->middleware('auth');
  Route::get('/suratpengajuan/detail/{id_pengajuan}', [PengajuanController::class, 'detailsuratpengajuan'])->middleware('auth');
  Route::post('/suratpengajuan/detail/terimapengajuan/{id_pengajuan}', [PengajuanController::class, 'updateterima'])->middleware('auth');
  Route::post('/suratpengajuan/detail/tolakpengajuan/{id_pengajuan}', [PengajuanController::class, 'updatetolak'])->middleware('auth');
});

Route::group(['middleware' => ['auth','level:Staff Hubin']], function() {
  Route::post('/suratpengajuan/detail/pengesahan/{id_pengajuan}', [PengajuanController::class, 'updatehubin'])->middleware('auth');
});

Route::group(['middleware' => ['auth','level:Siswa']], function() {
  Route::get('/siswa/suratpengajuan', [PengajuanController::class, 'indexsuratpengajuan'])->middleware('auth');
  Route::resource('/siswa/pengajuan', PengajuanController::class)->middleware('auth');
  Route::get('/siswa/suratpengajuan/{id_pengajuan}/edit', [PengajuanController::class, 'carisuratpengajuan'])->middleware('auth');
});

/*----------------------------------------------------------------------------------------*/



/*----------------------------- Route Modul Presensi Siswa -------------------------------*/

Route::get('/presensisiswa', [PresensisiswaController::class, 'presensi']);

/*----------------------------------------------------------------------------------------*/



/*----------------------------- Route Modul Kompetensi -------------------------------*/

Route::get('/kompetensi', [KompetensiController::class, 'index']);

/*----------------------------------------------------------------------------------------*/



/*------------------------------- Route Modul Data Prakerin ------------------------------*/

Route::group(['middleware' => ['auth','level:Staff Hubin,Kepala Program,Wali Kelas']], function() {
  Route::get('/dataprakerin', [PrakerinController::class, 'dataprakerin'])->middleware('auth');
  Route::get('/dataprakerin/show', [PrakerinController::class, 'cariprakerin'])->middleware('auth');
  Route::get('/dataprakerin/detail/{id_prakerin}', [PrakerinController::class, 'detailprakerin'])->middleware('auth');
  Route::post('/dataprakerin/keluarkan_siswa/{prakerin}', [PrakerinController::class, 'pecatSiswa'])->middleware('auth');
});

Route::group(['middleware' => ['auth','level:Staff Hubin']], function() {
  Route::get('/dataprakerin/hapus/{id_prakerin}', [PrakerinController::class, 'hapusprakerin'])->middleware('auth');
});

/*----------------------------------------------------------------------------------------*/



Route::get('/listsiswa', function() {
  return view('hubin.list_siswa');
});