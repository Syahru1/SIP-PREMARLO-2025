<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;

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
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {
    // Kelola Data Lomba
    Route::get('/kelola-data-lomba', [AdminController::class, 'kelolaDataLombaIndex'])->name('kelolaDataLomba.index');
    Route::get('/kelola-data-lomba/tambah', [AdminController::class, 'kelolaDataLombaTambah'])->name('kelolaDataLomba.tambah');
    Route::get('/kelola-data-lomba/edit', [AdminController::class, 'kelolaDataLombaEdit'])->name('kelolaDataLomba.edit');

    // Kelola Pengguna Admin
    Route::get('/kelola-pengguna-admin', [AdminController::class, 'kelolaAdminIndex'])->name('kelolaAdmin.index');
    Route::get('/kelola-pengguna-admin/tambah', [AdminController::class, 'kelolaAdminTambah'])->name('kelolaAdmin.tambah');
    Route::get('/kelola-pengguna-admin/edit', [AdminController::class, 'kelolaAdminEdit'])->name('kelolaAdmin.edit');

    // Kelola Pengguna Dosen
    Route::get('/kelola-pengguna-dosen', [AdminController::class, 'kelolaDosenIndex'])->name('kelolaDosen.index');
    Route::get('/kelola-pengguna-dosen/tambah', [AdminController::class, 'kelolaDosenTambah'])->name('kelolaDosen.tambah');
    Route::get('/kelola-pengguna-dosen/edit', [AdminController::class, 'kelolaDosenEdit'])->name('kelolaDosen.edit');

    // Kelola Pengguna Mahasiswa
    Route::get('/kelola-pengguna-mahasiswa', [AdminController::class, 'kelolaMahasiswaIndex'])->name('kelolaMahasiswa.index');
    Route::get('/kelola-pengguna-mahasiswa/tambah', [AdminController::class, 'kelolaMahasiswaTambah'])->name('kelolaMahasiswa.tambah');
    Route::get('/kelola-pengguna-mahasiswa/edit', [AdminController::class, 'kelolaMahasiswaEdit'])->name('kelolaMahasiswa.edit');
    
    // Kelola Periode
    Route::get('/kelola-periode', [AdminController::class, 'kelolaPeriodeIndex'])->name('kelolaPeriode.index');
    Route::get('/kelola-periode/tambah', [AdminController::class, 'kelolaPeriodeTambah'])->name('kelolaPeriode.tambah');
    Route::get('/kelola-periode/edit', [AdminController::class, 'kelolaPeriodeEdit'])->name('kelolaPeriode.edit');

    // Kelola Prodi
    Route::get('/kelola-prodi', [AdminController::class, 'kelolaProdiIndex'])->name('kelolaProdi.index');
    Route::get('/kelola-prodi/tambah', [AdminController::class, 'kelolaProdiTambah'])->name('kelolaProdi.tambah');
    Route::get('/kelola-prodi/edit', [AdminController::class, 'kelolaProdiEdit'])->name('kelolaProdi.edit');

    // Laporan Analisis Prestasi
    Route::get('/laporan-analisis-prestasi', [AdminController::class, 'laporanAnalisisPrestasiIndex'])->name('laporanAnalisisPrestasi.index');

    // Profile
    Route::get('/profile', [AdminController::class, 'profileIndex'])->name('profile.index');
    Route::get('/profile/edit', [AdminController::class, 'profileEdit'])->name('profile.edit');

    // Verifikasi Lomba
    Route::get('/verifikasi-lomba', [AdminController::class, 'verifikasiLombaIndex'])->name('verifikasiLomba.index');
    Route::get('/verifikasi-lomba/detail', [AdminController::class, 'verifikasiLombaDetail'])->name('verifikasiLomba.detail');

    // Verifikasi Prestasi
    Route::get('/verifikasi-prestasi', [AdminController::class, 'verifikasiPrestasiIndex'])->name('verifikasiPrestasi.index');
    Route::get('/verifikasi-prestasi/detail', [AdminController::class, 'verifikasiPrestasiDetail'])->name('verifikasiPrestasi.detail');
});

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/beranda', [MahasiswaController::class, 'beranda'])->name('beranda');
    Route::get('/prestasi', [MahasiswaController::class, 'prestasi'])->name('prestasi');
    Route::get('/lomba', [MahasiswaController::class, 'lomba'])->name('lomba');
    Route::get('/profil', [MahasiswaController::class, 'profil'])->name('profil');
    Route::get('/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('notifikasi');
    Route::get('/detail-prestasi', [MahasiswaController::class, 'detail_prestasi'])->name('detail-prestasi');
    Route::get('/detail-lomba', [MahasiswaController::class, 'detail_lomba'])->name('detail-lomba');
});
