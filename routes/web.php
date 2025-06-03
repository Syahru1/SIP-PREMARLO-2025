<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthController;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Route::middleware(['auth'])->group(function () {
    Route::get('/', [MasterController::class, 'index']);

    // ADMIN
    // Route::middleware(['auth:admin', 'authorize:ADM'])->group(function () {
        Route::group(['prefix' => 'admin'],function () {
            // Beranda
            Route::get('/beranda', [MasterController::class, 'admin'])->name('beranda');
            
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
    // });

    // MAHASISWA
    // Route::middleware(['auth:mahasiswa', 'authorize:MHS'])->group(function () {
        Route::group(['prefix' => 'mahasiswa'],function () {
            // Beranda
            Route::get('/beranda', [MasterController::class, 'mahasiswa'])->name('beranda.mahasiswa');
        
            Route::get('/prestasi', [MahasiswaController::class, 'prestasi'])->name('prestasi');
            Route::get('/lomba', [MahasiswaController::class, 'lomba'])->name('lomba');
            Route::get('/profil', [MahasiswaController::class, 'profil'])->name('profil');
            Route::get('/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('notifikasi');
            Route::get('/detail-prestasi', [MahasiswaController::class, 'detail_prestasi'])->name('detail-prestasi');
            Route::get('/detail-lomba', [MahasiswaController::class, 'detail_lomba'])->name('detail-lomba');
            Route::get('/sertifikat', [MahasiswaController::class, 'sertifikat'])->name('sertifikat');
            Route::get('/create-sertifikat', [MahasiswaController::class, 'create_sertifikat'])->name('sertifikat.create');
            Route::get('/minat', [MahasiswaController::class, 'minat'])->name('minat');
            Route::get('/create-minat', [MahasiswaController::class, 'create_minat'])->name('minat.create');
            Route::get('/bidang-keahlian', [MahasiswaController::class, 'bidang_keahlian'])->name('bidang-keahlian');
            Route::get('/create-bidang-keahlian', [MahasiswaController::class, 'create_bidang_keahlian'])->name('bidang-keahlian.create');
            Route::get('/pengalaman', [MahasiswaController::class, 'pengalaman'])->name('pengalaman');
            Route::get('/create-pengalaman', [MahasiswaController::class, 'create_pengalaman'])->name('pengalaman.create');
            Route::delete('/profil/minat/{id}', [MahasiswaController::class, 'delete']);
            Route::delete('/profil/bidang-keahlian/{id}', [MahasiswaController::class, 'delete']);
            Route::get('/edit-profil', [MahasiswaController::class, 'edit_profil'])->name('edit-profil');
        
        });
    // });

    // DOSEN
    // Route::middleware(['auth:dosen', 'authorize:DSN'])->group(function () {
        Route::group(['prefix' => 'dosen'],function () {
            // Beranda
            Route::get('/beranda', [MasterController::class, 'dosen'])->name('beranda.dosen');
        
            Route::get('/profil', [DosenController::class, 'profil'])->name('profil.dosen');
            Route::get('/lomba', [DosenController::class, 'lomba'])->name('lomba.dosen');
            Route::get('/notifikasi', [DosenController::class, 'notifikasi'])->name('notifikasi.dosen');
            Route::get('/mahasiswa-bimbingan', [DosenController::class, 'mahasiswa_bimbingan'])->name('mahasiswa-bimbingan');
            Route::get('/detail-mahasiswa', [DosenController::class, 'detail_mahasiswa'])->name('detail-mahasiswa');
            Route::get('/sertifikat', [DosenController::class, 'sertifikat'])->name('sertifikat.dosen');
            Route::get('/create-sertifikat', [DosenController::class, 'create_sertifikat'])->name('sertifikat.create.dosen');
            Route::get('/bidang-keahlian', [DosenController::class, 'bidang_keahlian'])->name('bidang-keahlian-dosen');
            Route::get('/create-bidang-keahlian', [DosenController::class, 'create_bidang_keahlian'])->name('bidang-keahlian.create.dosen');
            Route::get('/pengalaman', [DosenController::class, 'pengalaman'])->name('pengalaman.dosen');
            Route::get('/create-pengalaman', [DosenController::class, 'create_pengalaman'])->name('pengalaman.create.dosen');
            Route::delete('/profil/minat/{id}', [DosenController::class, 'delete']);
            Route::delete('/profil/bidang-keahlian/{id}', [DosenController::class, 'delete']);
            Route::get('/edit-profil', [DosenController::class, 'edit_profil'])->name('edit-profil.dosen');
        });
    // });
// });