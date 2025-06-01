<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beranda()
    {
        return view('mahasiswa.beranda.index'); 
    }

    public function prestasi()
    {
        return view('mahasiswa.prestasi.index'); 
    }

    public function lomba()
    {
        return view('mahasiswa.lomba.index'); 
    }

    public function profil()
    {
        return view('mahasiswa.profil.index'); 
    }

    public function notifikasi()
    {
        return view('mahasiswa.notifikasi'); 
    }

    public function detail_prestasi()
    {
        return view('mahasiswa.prestasi.detail-prestasi'); 
    }

    public function detail_lomba()
    {
        return view('mahasiswa.lomba.detail-lomba'); 
    }
}
