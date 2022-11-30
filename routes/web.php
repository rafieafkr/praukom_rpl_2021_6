<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffhubinController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengajuanMuridController;
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
Route::get('get-kompetensi', [PenilaianController::class, 'getKompetensi'])->name('getKompetensi');