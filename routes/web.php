<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Master\ClientController;
use App\Http\Controllers\Master\PembagianTugasController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('auth.login');
    }
});

Auth::routes();

// Route::middleware('auth')->group(function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//     Route::get('/master', [App\Http\Controllers\Master\MasterController::class, 'index'])->name('master');
//     Route::resource('kantor', App\Http\Controllers\Master\KantorController::class);
//     Route::resource('ruangan', App\Http\Controllers\Master\RuanganController::class);
//     Route::resource('lantai', App\Http\Controllers\Master\LantaiController::class);
//     Route::resource('tugas', App\Http\Controllers\Master\TugasController::class);
//     Route::resource('pengguna', App\Http\Controllers\PenggunaController::class);
//     Route::resource('laporan', App\Http\Controllers\LaporanController::class);
//     Route::resource('client', ClientController::class);
//     Route::get('/getclient/{id}', [ClientController::class, 'getclient']);
//     Route::post('/simpanpembagian', [PembagianTugasController::class, 'simpanpembagian']);
//     Route::delete('/hapuspembagianjob/{id}', [PembagianTugasController::class, 'hapuspembagianjob']);
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);
Route::group(['middleware' => ['auth', 'is_superadmin']], function () {
    Route::get('/master', [App\Http\Controllers\Master\MasterController::class, 'index'])->name('master');
    Route::resource('kantor', App\Http\Controllers\Master\KantorController::class);
    Route::resource('ruangan', App\Http\Controllers\Master\RuanganController::class);
    Route::resource('lantai', App\Http\Controllers\Master\LantaiController::class);
    Route::resource('tugas', App\Http\Controllers\Master\TugasController::class);
    Route::resource('pengguna', App\Http\Controllers\PenggunaController::class);
    Route::resource('client', ClientController::class);
    Route::post('/approval', [HomeController::class, 'approval']);
    Route::get('/changeapproval', [HomeController::class, 'changeapproval']);
    Route::get('/getclient/{id}', [ClientController::class, 'getclient']);
    Route::post('/simpanpembagian', [PembagianTugasController::class, 'simpanpembagian']);
    Route::delete('/hapuspembagianjob/{id}', [PembagianTugasController::class, 'hapuspembagianjob']);
    Route::resource('laporan', App\Http\Controllers\LaporanController::class);

    Route::resource('akantor', App\Http\Controllers\Master\AkantorController::class);
    Route::resource('agedung', App\Http\Controllers\Master\AgedungController::class);
    Route::resource('alantai', App\Http\Controllers\Master\AlantaiController::class);
    Route::resource('aruangan', App\Http\Controllers\Master\AruanganController::class);
    Route::resource('alokasi', App\Http\Controllers\Master\AlokasiController::class);
    Route::resource('aobjek', App\Http\Controllers\Master\AobjekController::class);
    Route::resource('ajabatan', App\Http\Controllers\Master\AjabatanController::class);
    Route::resource('apekerjaan', App\Http\Controllers\Master\ApekerjaanController::class);
    Route::resource('ajob', App\Http\Controllers\Master\AjobController::class);
    Route::resource('atodo', App\Http\Controllers\Master\AtodoController::class);
    Route::resource('arole', App\Http\Controllers\Master\AroleController::class);
    Route::resource('atoilet', App\Http\Controllers\Master\AToiletController::class);
    Route::resource('aoutdoor', App\Http\Controllers\Master\AOutdoorController::class);
});

Route::middleware('spv')->group(function () {
    // 
});
Route::middleware('client')->group(function () {
    // 
});
Route::middleware('petugas')->group(function () {
    // 
});
