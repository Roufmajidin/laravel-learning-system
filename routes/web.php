<?php

use App\Http\Controllers\AdminControl;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HasilStudiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QRCodeController;
use App\Http\Middleware\Admin;

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
    Route::get('/ujian-mhs', [DosenController::class, 'ujian']);
    Route::get('/active-mahasiswa/{id}/{nama_kelas}', [DosenController::class, 'ujianActive']);
    Route::post('proses-activate', [DosenController::class, 'prosesActive']);
    Route::get('/list-mhs-ujian/{id}/{nama_kelas}', [DosenController::class, 'listMhsUjian']);

    Route::get('/submit-nilai-mhs/{id}/{mk_id}/{semester_id}', [DosenController::class, 'submitNilai']);
    Route::post('proses-submit-nilai', [DosenController::class, 'prosesNilai']);
    Route::get('/generate-qr', [DosenController::class, 'qrCode']);
    Route::post('/tambah_materi_proses/{id}', [DosenController::class, 'prosesMateri']);
    Route::get('/detail-penugasan/{id}', [DosenController::class, 'detailPenugasan']);
});
// admin
Route::group(['middleware' => 'admin'], function () {

    Route::get('/jadwal-dosen', [AdminController::class, 'index']);
    Route::get('/detail-dosen/{id}', [AdminController::class, 'detailDosen']);
    Route::post('/dosen-kelas-tambah/{id}', [AdminController::class, 'CreateKelasDosen']);
    Route::get('/aktifkan-kelas-dosen/{id}/{dosen_id}', [AdminController::class, 'AktifKelasDosen']);
    Route::post('/active-proses', [AdminController::class, 'prosesActiveMk']);

    Route::get('/mahasiswa-data', [AdminController::class, 'mahasiswa']);
    Route::get('/kelas/{id}', [AdminController::class, 'kelasMahasiswa']);
    Route::post('/tambah-mhs-proses', [AdminController::class, 'tambahMhs'])->name('tambah-mhs-proses');
    Route::get('/data-mhs-ajax/{kelas_id}', [AdminController::class, 'kelasMahasiswaAjax']);
    Route::delete('/hapus-mhs/{id}', [AdminController::class, 'hapusMhs']);
    Route::get('/update-semester', [AdminController::class, 'updateSemester']);
    Route::get('/update-semeste', [AdminController::class, 'updateTampilMhs']);
    Route::get('/update-mhs', [AdminController::class, 'mahasiswaBysemesterCreateUpdate']);
    Route::Post('/update-mhs-proses', [AdminController::class, 'mahasiswaBysemesterProsesUpdate']);


});


Route::group(['middleware' => 'mahasiswa'], function () {

    Route::get('/profil-mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/jadwal', [MahasiswaController::class, 'jadwal'])->name('jadwal');
    Route::get('/detailkelasmahasiswa/{id}/', [MahasiswaController::class, 'detailKelas'])->name("detailkelasmahasiswa");
    Route::get('/absen/{id}', [MahasiswaController::class, 'absenMhs']);
    Route::post('/absenproses/{id}/', [MahasiswaController::class, 'absenproses']);
    Route::get('/absensi/{id}', [MahasiswaController::class, 'absensiMahasiswaByJadwalDosen']);
    Route::get('/modul/{id}/', [MahasiswaController::class, 'modul']);
    Route::get('/cekAbsenMhs/{id}/', [MahasiswaController::class, 'cekabsenMhs']);
    Route::get('/e-ujian', [HasilStudiController::class, 'index']);
    Route::get('/mhsJawaban/{id}', [HasilStudiController::class, 'kumpulkanJawaban']);
    Route::post('/submit-proses/{id}/', [HasilStudiController::class, 'storeUjian']);
    Route::get('/lihat-materi/{id}/', [MahasiswaController::class, 'lihatMateri']);
    Route::post('/insert', [MahasiswaController::class, 'coba'])->name('insert');
    Route::get('/coba', [MahasiswaController::class, 'cobaC'])->name('proses');
    Route::get('/t', [MahasiswaController::class, 'tet']);
    Route::post('/kumpulkan-tugas-mhs', [MahasiswaController::class, 'kumpulkanTugas']);
    Route::get('/cek-ativitas/{id}/', [MahasiswaController::class, 'aktivitasMhs']);
    Route::get('/delete-upload/{id}/', [MahasiswaController::class, 'deleteProses']);
    // Route::get('/type/{id}/', [MahasiswaController::class, 'deleteProses']);
    Route::get('/ujian', [HasilStudiController::class, 'typeUjian']);
    Route::get('/type/{id}', [HasilStudiController::class, 'ujianOn']);
    Route::get('/test', [MahasiswaController::class, 'ajaxPage'])->name('test');
    Route::get('/krs-online', [MahasiswaController::class, 'krsMhs'])->name('krs');
    Route::post('/krs-online-proses', [MahasiswaController::class, 'krsMhsProses']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
