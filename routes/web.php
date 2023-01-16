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