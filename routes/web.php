<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HasilStudiController;
use App\Http\Controllers\MahasiswaController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'dosen'], function () {

    Route::get('/jadwaldosen', [DosenController::class, 'index']);
    Route::get('/kelas-detail/{id}', [DosenController::class, 'detail']);
    Route::get('/detailkelasDosen/{id}', [DosenController::class, 'detailKelasDosen']);
    Route::get('/pertemuan/{id}', [DosenController::class, 'pertemuan']);
    Route::get('/kelas-all', [DosenController::class, 'kelasAll']);
    Route::get('/tambahpertemuan/{id}', [DosenController::class, 'createpertemuan']);

    Route::post('/tambahpertemuanproses/{id}', [DosenController::class, 'storepertemuan']);
    //mahasiswa ROute
    Route::get('/absen/{id}', [DosenController::class, 'absen']);
    Route::get('/coba', [DosenController::class, 'coba']);
    Route::get('/materi_detail/{id}', [DosenController::class, 'detailMateri']);
    Route::get('/buat-absen/{id}', [DosenController::class, 'buatabsen']);
    // Route::get('/buat-absen/{id}', [DosenController::class, 'buatabsen']);
    Route::get('/pertemuan/{id}', [DosenController::class, 'absenMhs']);
    Route::get('/absensi-mhs/{id}', [DosenController::class, 'ingatkanAbsen']);
    Route::post('buatAbsenProses/{id}', [DosenController::class, 'buatabsenProses']);
    Route::get('/ujian', [DosenController::class, 'ujian']);
    Route::get('/active-mahasiswa/{id}/{mk_id}', [DosenController::class, 'ujianActive']);
    Route::post('proses-activate', [DosenController::class, 'prosesActive']);
    Route::get('/list-mhs-ujian/{id}/{mk_id}', [DosenController::class, 'listMhsUjian']);

});

Route::group(['middleware' => 'mahasiswa'], function () {

    Route::get('/profil-mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/jadwal', [MahasiswaController::class, 'jadwal']);
    Route::get('/detailkelasmahasiswa/{id}', [MahasiswaController::class, 'detailKelas']);
    Route::get('/absen/{id}', [MahasiswaController::class, 'absenMhs']);
    Route::post('/absenproses/{id}', [MahasiswaController::class, 'absenproses']);
    Route::get('/absensi/{id}', [MahasiswaController::class, 'absensiMahasiswaByJadwalDosen']);
    Route::get('/modul/{id}', [MahasiswaController::class, 'modul']);
    Route::get('/cekAbsenMhs/{id}', [MahasiswaController::class, 'cekabsenMhs']);
    Route::get('/e-ujian', [HasilStudiController::class, 'index']);





});
