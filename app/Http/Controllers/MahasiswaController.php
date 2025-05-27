<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beranda()
    {
        return view('mahasiswa.beranda'); 
    }

    public function prestasi()
    {
        return view('mahasiswa.prestasi'); 
    }

    public function lomba()
    {
        return view('mahasiswa.lomba'); 
    }

    public function profil()
    {
        return view('mahasiswa.profil'); 
    }

    public function notifikasi()
    {
        return view('mahasiswa.notifikasi'); 
    }

    public function detail_prestasi()
    {
        return view('mahasiswa.detail-prestasi'); 
    }

    public function detail_lomba()
    {
        return view('mahasiswa.detail-lomba'); 
    }
}
