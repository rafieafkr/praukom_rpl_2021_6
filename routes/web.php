<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffhubinController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\PengajuanController;

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
Route::resource('/hubin/leveluser', AkunController::class)->parameters(['leveluser' => 'akun'])->names([
  'index', 'hubin.leveluser.index',
  'store', 'hubin.leveluser.simpan',
  'destroy', 'hubin.leveluser.hapus',
  'edit', 'hubin.leveluser.edit',
  'update', 'hubin.leveluser.update',
]);

Route::resource('/siswa/pengajuan', PengajuanController::class);

Route::get('/hubin/listsiswa', function() {
  return view('dashboard.hubin.list_siswa');
})->name('hubin.listsiswa');
