<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffhubinController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengajuanMuridController;
use App\Http\Controllers\PenilaianController;
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

Route::get('/', function() {
  return redirect('/hubin');
});
Route::get('/login', [loginController::class, 'index']);

Route::get('/hubin', [StaffhubinController::class, 'index']);

Route::get('/listsiswa', function() {
  return view('hubin.list_siswa');
});

Route::get('/pengajuan', [PengajuanController::class, 'viewjoin']);
Route::get('/hapus/{id}',[PengajuanController::class,'hapus']);

Route::get('/pengajuanmurid',[PengajuanMuridController::class,'form']);


Route::get('/penilaian', [PenilaianController::class, 'index']);
Route::get('/getKompetensi', [PenilaianController::class, 'getKompetensi'])->name('getKompetensi');
Route::post('/simpan_nilai',[PenilaianController::class,'simpan']);
Route::get('/nilai/edit/{id}',[PenilaianController::class,'edit']);
Route::post('/nilai/edit/update',[PenilaianController::class,'update']);

Route::get('/presensi', [PresensisiswaController::class, 'index']);
Route::get('/get-kompetensi', [PresensisiswaController::class, 'getPp'])->name('getPp');
Route::post('/simpan',[PresensisiswaController::class,'simpan']);
Route::get('/edit/{id}',[PresensisiswaController::class,'edit']);
Route::put('/update_presensi',[PresensisiswaController::class,'update']);