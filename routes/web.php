<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;


Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/beranda', [MahasiswaController::class, 'beranda'])->name('beranda');
    Route::get('/prestasi', [MahasiswaController::class, 'prestasi'])->name('prestasi');
    Route::get('/lomba', [MahasiswaController::class, 'lomba'])->name('lomba');
    Route::get('/profil', [MahasiswaController::class, 'profil'])->name('profil');
    Route::get('/notifikasi', [MahasiswaController::class, 'notifikasi'])->name('notifikasi');
    Route::get('/detail-prestasi', [MahasiswaController::class, 'detail_prestasi'])->name('detail-prestasi');
    Route::get('/detail-lomba', [MahasiswaController::class, 'detail_lomba'])->name('detail-lomba');
});

