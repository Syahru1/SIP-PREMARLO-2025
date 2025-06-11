<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\PersonalisasiController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\UserController;


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

Route::get('/test-personalisasi', [PersonalisasiController::class,'test']);
Route::get('/get-bidang', [PersonalisasiController::class,'getBidang'])->name('get.bidang');


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


    Route::get('/', [MasterController::class, 'index']);

    // ADMIN
    Route::middleware(['auth:admin'])->group(function () {
        Route::group(['prefix' => 'admin'],function () {
            // Beranda
            Route::get('/beranda', [MasterController::class, 'admin'])->name('beranda');

            // Kelola Data Lomba
            Route::get('/kelola-data-lomba', [AdminController::class, 'kelolaDataLombaIndex'])->name('kelolaDataLomba.index');
            Route::get('/kelola-data-lomba/tambah', [AdminController::class, 'kelolaDataLombaTambah'])->name('kelolaDataLomba.tambah');
            Route::get('/kelola-data-lomba/edit', [AdminController::class, 'kelolaDataLombaEdit'])->name('kelolaDataLomba.edit');

            // Kelola Pengguna Admin
            Route::get('/kelola-admin', [AdminController::class, 'kelolaAdminIndex'])->name('kelolaAdmin.index');
            Route::post('/kelola-admin/list', [AdminController::class, 'kelolaAdminList']);
            Route::get('/kelola-admin/tambah', [AdminController::class, 'kelolaAdminTambah'])->name('kelolaAdmin.tambah');
            Route::post('/kelola-admin/store', [AdminController::class, 'kelolaAdminStore']);
            Route::get('/kelola-admin/edit/{id}', [AdminController::class, 'kelolaAdminEdit'])->name('kelolaAdmin.edit');
            Route::put('/kelola-admin/update/{id}', [AdminController::class, 'kelolaAdminUpdate'])->name('kelolaAdmin.update');
            Route::get('/kelola-admin/confirm-delete/{id}', [AdminController::class, 'kelolaAdminConfirmDelete']);
            Route::delete('/kelola-admin/delete/{id}', [AdminController::class, 'kelolaAdminDelete']);
            Route::delete('/kelola-admin/{id}', [AdminController::class, 'kelolaAdminDestroy']);

            // Kelola Pengguna Dosen
            Route::get('/kelola-pengguna-dosen', [AdminController::class, 'kelolaDosenIndex'])->name('kelolaDosen.index');
            Route::post('/kelola-dosen/list', [AdminController::class, 'kelolaDosenList']);
            Route::get('/kelola-dosen/tambah', [AdminController::class, 'kelolaDosenTambah'])->name('kelolaDosen.tambah');
            Route::post('/kelola-dosen/store', [AdminController::class, 'kelolaDosenStore']);
            Route::get('/kelola-dosen/edit/{id}', [AdminController::class, 'kelolaDosenEdit'])->name('kelola-dosen.edit');
            Route::put('/kelola-dosen/update/{id}', [AdminController::class, 'kelolaDosenUpdate'])->name('kelola-dosen.update');
            Route::get('/kelola-dosen/confirm-delete/{id}', [AdminController::class, 'kelolaDosenConfirmDelete']);
            Route::delete('/kelola-dosen/delete/{id}', [AdminController::class, 'kelolaDosenDelete']);
            Route::delete('/kelola-dosen/{id}', [AdminController::class, 'kelolaDosenDestroy']);

            // Kelola Pengguna Mahasiswa
            Route::get('/kelola-pengguna-mahasiswa', [AdminController::class, 'kelolaMahasiswaIndex'])->name('kelolaMahasiswa.index');
            Route::post('/kelola-mahasiswa/list', [AdminController::class, 'kelolaMahasiswaList']);
            Route::get('/kelola-mahasiswa/tambah', [AdminController::class, 'kelolaMahasiswaTambah'])->name('kelolaMahasiswa.tambah');
            Route::post('/kelola-mahasiswa/store', [AdminController::class, 'kelolaMahasiswaStore']);
            Route::get('/kelola-mahasiswa/edit/{id}', [AdminController::class, 'kelolaMahasiswaEdit'])->name('kelola-mahasiswa.edit');
            Route::put('/kelola-mahasiswa/update/{id}', [AdminController::class, 'kelolaMahasiswaUpdate'])->name('kelola-mahasiswa.update');
            Route::get('/kelola-mahasiswa/confirm-delete/{id}', [AdminController::class, 'kelolaMahasiswaConfirmDelete']);
            Route::delete('/kelola-mahasiswa/delete/{id}', [AdminController::class, 'kelolaMahasiswaDelete']);
            Route::delete('/kelola-mahasiswa/{id}', [AdminController::class, 'kelolaMahasiswaDestroy']);

            // Kelola Periode
            Route::get('/kelola-periode', [AdminController::class, 'kelolaPeriodeIndex']);
            Route::post('/kelola-periode/list', [AdminController::class, 'kelolaPeriodeList'])->name('kelola-periode.list');
            Route::get('/kelola-periode/tambah', [AdminController::class, 'kelolaPeriodeTambah']);
            Route::post('/kelola-periode/store', [AdminController::class, 'kelolaPeriodeStore']);
            Route::get('/kelola-periode/edit/{id}', [AdminController::class, 'kelolaPeriodeEdit']);
            Route::put('/kelola-periode/update/{id}', [AdminController::class, 'kelolaPeriodeUpdate'])->name('kelola-periode.update');
            Route::get('/kelola-periode/confirm-delete/{id}', [AdminController::class, 'kelolaPeriodeConfirmDelete']);
            Route::delete('/kelola-periode/delete/{id}', [AdminController::class, 'kelolaPeriodeDelete']);
            Route::delete('/kelola-periode/{id}', [AdminController::class, 'kelolaPeriodeDestroy']);

            // Kelola Prodi
            Route::get('/kelola-prodi', [AdminController::class, 'kelolaProdiIndex']);
            Route::post('/kelola-prodi/list', [AdminController::class, 'kelolaProdiList'])->name('kelola-prodi.list');
            Route::get('/kelola-prodi/tambah', [AdminController::class, 'kelolaProdiTambah']);
            Route::post('/kelola-prodi/store', [AdminController::class, 'kelolaProdiStore']);
            Route::get('/kelola-prodi/edit/{id}', [AdminController::class, 'kelolaProdiEdit']);
            Route::put('/kelola-prodi/update/{id}', [AdminController::class, 'kelolaProdiUpdate'])->name('kelola-prodi.update');
            Route::get('/kelola-prodi/confirm-delete/{id}', [AdminController::class, 'kelolaProdiConfirmDelete']);
            Route::delete('/kelola-prodi/delete/{id}', [AdminController::class, 'kelolaProdiDelete']);
            Route::delete('/kelola-prodi/{id}', [AdminController::class, 'kelolaProdiDestroy']);

            // Laporan Analisis Prestasi
            Route::get('/laporan-analisis-prestasi', [PrestasiController::class, 'laporanAnalisisPrestasiIndex'])->name('laporanAnalisisPrestasi.index');
            Route::get('/laporan-analisis-prestasi/detail/{id}', [PrestasiController::class, 'laporanAnalisisPrestasiDetail'])->name('laporan.detail');
            Route::get('/laporan-analisis-prestasi/export_excel', [PrestasiController::class, 'laporanAnalisisPrestasiExportExcel'])->name('laporanAnalisisPrestasi.exportExcel');
            Route::get('/laporan-analisis-prestasi/export_pdf', [PrestasiController::class, 'laporanAnalisisPrestasiExportPDF'])->name('laporanAnalisisPrestasi.exportPDF');

            // Rekomendasi lomba
            Route::get('/rekomendasi-lomba', [SPKController::class, 'rekomendasiLombaIndex'])->name('admin.rekomendasiLomba.index');
            Route::get('/rekomendasi-lomba/lihat/{id}', [SPKController::class, 'rekomendasiLombaLihat'])->name('rekomendasi.lomba.lihat');
            Route::post('/rekomendasi-lomba/list', [SPKController::class, 'rekomendasiListMahasiswa'])->name('rekomendasi-lomba.list');

            // Profile
            Route::get('/profile', [AdminController::class, 'profileIndex'])->name('profile.index');
            Route::get('/profile/edit', [AdminController::class, 'profileEdit'])->name('profile.edit');

            // Verifikasi Lomba
            Route::get('/verifikasi-lomba', [LombaController::class, 'index'])->name('verifikasiLomba.index');
            Route::post('/verifikasi-lomba/{id}/verifikasi', [LombaController::class, 'verifikasiLomba'])->name('verifikasiLomba.index');
            Route::post('/verifikasi-lomba/list', [LombaController::class, 'verifikasiLombaList'])->name('verifikasiLomba.detail');
            Route::get('/verifikasi-lomba/detail/{id}', [LombaController::class, 'verifikasiLombaDetail'])->name('verifikasiLomba.detail');

            // Verifikasi Prestasi
            Route::get('/verifikasi-prestasi', [PrestasiController::class, 'verifikasiPrestasiIndex'])->name('verifikasiPrestasi.index');
            Route::post('/verifikasi-prestasi/list', [PrestasiController::class, 'verifikasiPrestasiList'])->name('verifikasiPrestasi.index');
            Route::get('/verifikasi-prestasi/detail/{id}', [PrestasiController::class, 'verifikasiPrestasiDetail'])->name('verifikasiPrestasi.detail');
            Route::post('/verifikasi-prestasi/{id}/verifikasi', [PrestasiController::class, 'verifikasiPrestasi']);
            Route::get('/verifikasi-prestasi/tambah', [PrestasiController::class, 'verifikasiPrestasiTambah']);
            Route::post('/verifikasi-prestasi/store', [PrestasiController::class, 'verifikasiPrestasiStore']);
            Route::get('/verifikasi-prestasi/edit/{id}', [PrestasiController::class, 'verifikasiPrestasiEdit']);
            Route::put('/verifikasi-prestasi/update/{id}', [PrestasiController::class, 'verifikasiPrestasiUpdate'])->name('verifikasi-prestasi.update');
            Route::get('/verifikasi-prestasi/confirm-delete/{id}', [PrestasiController::class, 'verifikasiPrestasiConfirmDelete']);
            Route::delete('/verifikasi-prestasi/delete/{id}', [PrestasiController::class, 'verifikasiPrestasiDelete']);
            Route::delete('/verifikasi-prestasi/{id}', [PrestasiController::class, 'verifikasiPrestasiDestroy']);

        });
    });

    Route::middleware(['auth:mahasiswa'])->group(function () {
        Route::group(['prefix' => 'mahasiswa'],function () {
            // Beranda
            Route::get('/beranda', [MasterController::class, 'mahasiswa'])->name('beranda.mahasiswa');
            Route::get('/mahasiswa/prestasi/pencatatan', [MahasiswaController::class, 'pencatatan'])->name('mahasiswa.prestasi.pencatatan');
            Route::get('/mahasiswa/prestasi/riwayat', [MahasiswaController::class, 'riwayat'])->name('mahasiswa.prestasi.riwayat');

            // Lomba
            Route::get('/lomba', [MahasiswaController::class, 'lomba'])->name('lomba');
            Route::post('/lomba/store', [MahasiswaController::class, 'storeLomba']);
            Route::get('/lomba/riwayat-lomba/{id}', [MahasiswaController::class, 'edit_lomba'])->name('lomba');
            Route::put('/lomba/riwayat-lomba/{id}/update', [MahasiswaController::class, 'update_lomba'])->name('lomba');
            Route::get('/lomba/detail-lomba/{id}', [MahasiswaController::class, 'detail_lomba'])->name('detail-lomba.mahasiswa');

            //prestasi
            Route::get('/prestasi', [MahasiswaController::class, 'prestasi'])->name('mahasiswa.prestasi');
            Route::get('/prestasi/riwayat', [MahasiswaController::class, 'riwayat'])->name('mahasiswa.riwayat');
            Route::get('/detail-prestasi/{id}', [MahasiswaController::class, 'detailPrestasi'])->name('mahasiswa.detail-prestasi');
            Route::get('/edit-prestasi/{id}', [MahasiswaController::class, 'editPrestasi'])->name('mahasiswa.edit-prestasi');
            Route::put('/update-prestasi/{id}', [MahasiswaController::class, 'updatePrestasi'])->name('mahasiswa.update-prestasi');
            Route::post('/prestasi/store', [MahasiswaController::class, 'storePrestasi']);

            Route::get('/profil', [MahasiswaController::class, 'profil'])->name('profil');
            Route::get('/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('notifikasi');
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
    });

    // DOSEN
    Route::middleware(['auth:dosen'])->group(function () {
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
    });
