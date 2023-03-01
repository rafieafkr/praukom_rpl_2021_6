<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PrakerinController;
use App\Http\Controllers\KepalaprogramController;
use App\Http\Controllers\PresensisiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PenilaianController;

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
  return redirect('/login');
});

/*------------------------------------- Route Login --------------------------------------*/

// Route::get('/login', [loginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/hack', [LoginController::class, 'hack']);

/*----------------------------------------------------------------------------------------*/



/*----------------------------------- Route Dashboard ------------------------------------*/

Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard.index');
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

Route::get('/presensi-siswasiswa', [PresensisiswaController::class, 'presensi']);

/*----------------------------------------------------------------------------------------*/



/*----------------------------- Route Modul Kompetensi -------------------------------*/

Route::group(['middleware' => ['auth','level:Kepala Program']], function() {
  Route::get('/kompetensi', [KompetensiController::class, 'index'])->middleware('auth');
  Route::post('/kompetensi/tambah', [KompetensiController::class, 'tambahkompetensi'])->middleware('auth');
  Route::get('/kompetensi/hapus/{id_kompetensi}', [KompetensiController::class, 'hapuskompetensi'])->middleware('auth');
});

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



// Routes Fitur Penilaian Siswa
Route::get('/penilaian', [PenilaianController::class, 'index']);
Route::get('/getKompetensi', [PenilaianController::class, 'getKompetensi'])->name('getKompetensi');
Route::post('/simpan_nilai',[PenilaianController::class,'simpanKompetensi']);
Route::post('/simpan_sikap',[PenilaianController::class,'simpanSikap']);
Route::get('/nilai/edit/{id}',[PenilaianController::class,'editKompetensi']);
Route::get('/sikap/edit/{id}',[PenilaianController::class,'editSikap']);
Route::post('/nilai/edit/update',[PenilaianController::class,'updateKompetensi']);
Route::post('/sikap/edit/update',[PenilaianController::class,'updateSikap']);
Route::get('/search_penilaian',[PenilaianController::class,'cariTableKompetensi']);
Route::get('/search_penilaian_sikap',[PenilaianController::class,'cariTableSikap']);
Route::get('/cetak_penilaian/{id}', [PenilaianController::class, 'print']);

//Routes Fitur Presensi Siswa
// Route::get('/presensi-siswa', [PresensisiswaController::class, 'index']);
// Route::post('/presensi-siswa/simpan',[PresensisiswaController::class,'simpan']);
// Route::get('/presensi-siswa/{presensi}/edit/',[PresensisiswaController::class,'edit']);
// Route::put('/presensi-siswa/{presensi}',[PresensisiswaController::class,'update']);
// Route::delete('/presensi-siswa/{presensi}',[PresensisiswaController::class,'hapus']);
Route::resource('/presensi-siswa', PresensisiswaController::class)->parameter('presensi-siswa', 'presensi');
Route::get('/search',[PresensisiswaController::class,'cari']);
Route::get('/presensi-siswa/{id}/cetak', [PresensisiswaController::class, 'print'])->name('presensi-siswa.print');

//Route Fitur Jurusan
Route::get('/jurusan', [JurusanController::class, 'index']);
Route::post('/tambah_jurusan', [JurusanController::class, 'simpan']);
Route::get('/search_jurusan',[JurusanController::class,'cari']);
Route::delete('/hapus_jurusan/{id}',[JurusanController::class,'hapus']);
Route::get('/jurusan/edit/{id}',[JurusanController::class,'edit']);
Route::post('/jurusan/update',[JurusanController::class,'update']);

//Route Fitur Kompetensi
Route::get('/kompetensi', [KompetensiController::class, 'index']);
Route::post('/tambah_kompetensi', [KompetensiController::class, 'simpan']);
Route::get('/search_kompetensi',[KompetensiController::class,'cari']);
Route::delete('/hapus_kompetensi/{id}',[KompetensiController::class,'hapus']);
Route::get('/kompetensi/edit/{id}',[KompetensiController::class,'edit']);
Route::post('/kompetensi/update',[KompetensiController::class,'update']);

// Fitur tambah akun
Route::resource('/hubin/leveluser', AkunController::class)->parameters(['leveluser' => 'akun']);

// Fitur tambah pengajuan
Route::resource('/pengajuan', PengajuanController::class);

// tabel list siswa
Route::get('/hubin/listsiswa', function() {
  return view('dashboard.hubin.list_siswa');
})->name('hubin.listsiswa');