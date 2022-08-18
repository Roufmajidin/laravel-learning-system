<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
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
Route::group(['middleware' => 'dosen'], function () {

    Route::get('/jadwaldosen', [DosenController::class, 'index']);
    Route::get('/detailkelas/{id}', [DosenController::class, 'detail']);
    Route::get('/pertemuan/{id}', [DosenController::class, 'pertemuan']);
    Route::get('/kelas-all', [DosenController::class, 'kelasAll']);
    Route::get('/tambahpertemuan/{id}', [DosenController::class, 'createpertemuan']);

    Route::post('/tambahpertemuanproses/{id}', [DosenController::class, 'storepertemuan']);
    //mahasiswa ROute
    Route::get('/absen/{id}', [DosenController::class, 'absen']);
    Route::get('/coba', [DosenController::class, 'coba']);
    Route::get('/materi_detail/{id}', [DosenController::class, 'detailMateri']);

});

Route::group(['middleware' => 'mahasiswa'], function () {

    Route::get('/profil-mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/jadwal', [MahasiswaController::class, 'jadwal']);
    Route::get('/detailkelasmahasiswa/{id}', [MahasiswaController::class, 'detailKelas']);
    Route::get('/absen/{id}', [MahasiswaController::class, 'absenMhs']);
    Route::post('/absenproses/{id}', [MahasiswaController::class, 'absenproses']);






});
