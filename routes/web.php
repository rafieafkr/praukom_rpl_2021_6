<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffhubinController;

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
Route::get('/hubin/leveluser', function() {
    return view('dashboard.hubin.leveluser');
  }
)->name('hubin.leveluser');

Route::get('/hubin/listsiswa', function() {
  return view('dashboard.hubin.list_siswa');
})->name('hubin.listsiswa');