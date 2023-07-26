<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master', [App\Http\Controllers\Master\MasterController::class, 'index'])->name('master');
Route::resource('kantor', App\Http\Controllers\Master\KantorController::class);
Route::resource('ruangan', App\Http\Controllers\Master\RuanganController::class);
Route::resource('lantai', App\Http\Controllers\Master\LantaiController::class);
Route::resource('tugas', App\Http\Controllers\Master\TugasController::class);
Route::resource('pengguna', App\Http\Controllers\PenggunaController::class);
Route::resource('laporan', App\Http\Controllers\LaporanController::class);
