<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Kelola Data Lomba
    public function kelolaDataLombaIndex()
    {
        return view('admin.kelolaDataLomba.index');
    }

    public function kelolaDataLombaTambah()
    {
        return view('admin.kelolaDataLomba.tambahLomba');
    }

    public function kelolaDataLombaEdit()
    {
        return view('admin.kelolaDataLomba.editLomba');
    }

    // Kelola Pengguna Admin
    public function kelolaAdminIndex()
    {
        return view('admin.kelolaPenggunaAdmin.index');
    }

    public function kelolaAdminTambah()
    {
        return view('admin.kelolaPenggunaAdmin.tambahAdmin');
    }

    public function kelolaAdminEdit()
    {
        return view('admin.kelolaPenggunaAdmin.editAdmin');
    }

    // Kelola Pengguna Dosen
    public function kelolaDosenIndex()
    {
        return view('admin.kelolaPenggunaDosen.index');
    }

    public function kelolaDosenTambah()
    {
        return view('admin.kelolaPenggunaDosen.tambahDosen');
    }

    public function kelolaDosenEdit()
    {
        return view('admin.kelolaPenggunaDosen.editDosen');
    }

    // Kelola Pengguna Mahasiswa
    public function kelolaMahasiswaIndex()
    {
        return view('admin.kelolaPenggunaMahasiswa.index');
    }

    public function kelolaMahasiswaTambah()
    {
        return view('admin.kelolaPenggunaMahasiswa.tambahMahasiswa');
    }

    public function kelolaMahasiswaEdit()
    {
        return view('admin.kelolaPenggunaMahasiswa.editMahasiswa');
    }

    // Kelola Periode
    public function kelolaPeriodeIndex()
    {
        return view('admin.kelolaPeriode.index');
    }

    public function kelolaPeriodeTambah()
    {
        return view('admin.kelolaPeriode.tambahPeriode');
    }

    public function kelolaPeriodeEdit()
    {
        return view('admin.kelolaPeriode.editPeriode');
    }

    // Kelola Prodi
    public function kelolaProdiIndex()
    {
        return view('admin.kelolaProdi.index');
    }

    public function kelolaProdiTambah()
    {
        return view('admin.kelolaProdi.tambahProdi');
    }

    public function kelolaProdiEdit()
    {
        return view('admin.kelolaProdi.editProdi');
    }

     // Laporan Analisis Prestasi
    public function laporanAnalisisPrestasiIndex()
    {
        return view('admin.laporanAnalisisPrestasi.index');
    }

    // Profile
    public function profileIndex()
    {
        return view('admin.profile.index');
    }

    public function profileEdit()
    {
        return view('admin.profile.editProfile');
    }

    // Verifikasi Lomba
    public function verifikasiLombaIndex()
    {
        return view('admin.verifikasiLomba.index');
    }

    public function verifikasiLombaDetail($id)
    {
        return view('admin.verifikasiLomba.detailLomba', compact('id'));
    }

    // Verifikasi Prestasi
    public function verifikasiPrestasiIndex()
    {
        return view('admin.verifikasiPrestasi.index');
    }

    public function verifikasiPrestasiDetail($id)
    {
        return view('admin.verifikasiPrestasi.detailPrestasi', compact('id'));
    }
}
