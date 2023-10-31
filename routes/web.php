<?php

use App\Http\Controllers\BidangController;
use App\Http\Controllers\GrafikPaguRealisasiController;
use App\Http\Controllers\KategoriKegiatan;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KurvaSController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function () {
    Route::get('beranda', 'BerandaOperatorController@index')->name('operator.beranda');
    Route::get('villages', 'DependantDropdownController@villages')->name('villages');
    Route::resource('program', ProgramController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('sub-kegiatan','\App\Http\Controllers\SubKegiatanController');
    Route::resource('kategori-kegiatan','\App\Http\Controllers\KategoriKegiatanController');
});

Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('bidang', BidangController::class);
    Route::resource('kurva-s', KurvaSController::class);
    Route::resource('grafik-pagu-realisasi','\App\Http\Controllers\GrafikPaguRealisasiController');
    Route::get('villages', 'DependantDropdownController@villages')->name('villages');
    Route::get('rekap-kegiatan', 'RekapKegiatanController@index')->name('rekap-kegiatan.index');
    Route::get('rekap-kegiatan/{bidang}/{bulan?}', 'RekapKegiatanController@show')->name('rekap-kegiatan.show');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});
