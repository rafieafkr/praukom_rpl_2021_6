<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffhubinController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringController;

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

Route::get('/dashboard', [StaffhubinController::class, 'index'])->middleware('auth');

// Route Modul Monitoring
Route::get('/monitoring', [MonitoringController::class, 'index']);
Route::get('/monitoring/tambah', [MonitoringController::class, 'tambah']);
Route::post('/monitoring/masuk', [MonitoringController::class, 'store']);
Route::get('/monitoring/edit/{id_monitoring}', [MonitoringController::class, 'edit']);
Route::post('/monitoring/update', [MonitoringController::class, 'update']);
Route::post('/monitoring/hapus', [MonitoringController::class, 'destroy']);

// Route Modul Pilih Pembimbing Sekolah
Route::get('/pilihpembimbingsekolah', [MonitoringController::class, 'index']);
Route::get('/pilihpembimbingsekolah/tambah', [MonitoringController::class, 'tambah']);
Route::post('/pilihpembimbingsekolah/masuk', [MonitoringController::class, 'store']);
Route::get('/pilihpembimbingsekolah/edit/{id_monitoring}', [MonitoringController::class, 'edit']);
Route::post('/pilihpembimbingsekolah/update', [MonitoringController::class, 'update']);
Route::post('/pilihpembimbingsekolah/hapus', [MonitoringController::class, 'destroy']);


Route::get('/listsiswa', function() {
  return view('hubin.list_siswa');
});