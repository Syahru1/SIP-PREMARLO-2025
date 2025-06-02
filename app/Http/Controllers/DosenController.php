<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function beranda()
    {
        return view('dosen.beranda.index'); 
    }

    public function prestasi()
    {
        return view('dosen.prestasi.index'); 
    }

    public function lomba()
    {
        return view('dosen.lomba.index'); 
    }

    public function profil()
    {
        return view('dosen.profil.index'); 
    }

    public function notifikasi()
    {
        return view('dosen.notifikasi'); 
    }

    public function detail_prestasi()
    {
        return view('dosen.prestasi.detail-prestasi'); 
    }

    public function detail_lomba()
    {
        return view('dosen.lomba.detail-lomba'); 
    }

    public function edit_profil()
    {
        // Data dummy user
        $user = (object)[
            'name' => 'Budi Santoso',
            'lokasi' => 'Jakarta',
            'photo' => 'foto-profil.jpg', // misal ini file sudah ada di storage
        ];

        return view('dosen.profil.edit-profil', compact('user'));
    }      

    public function sertifikat()
    {
        return view('dosen.profil.sertifikat-page'); 
    }

    public function create_sertifikat()
    {
        return view('dosen.profil.create-sertifikat'); 
    }

    public function delete_sertifikat($id)
    {
        return redirect()->back()->with('success', 'Sertifikat berhasil dihapus.');
    }

    public function bidang_keahlian()
    {
        return view('dosen.profil.bidang-keahlian-page'); 
    }

    public function create_bidang_keahlian()
    {
        return view('dosen.profil.create-bidang-keahlian'); 
    }

    public function delete_bidang_keahlian($id)
    {
        return redirect()->back()->with('success', 'Bidang keahlian berhasil dihapus.');
    }

    public function pengalaman()
    {
        return view('dosen.profil.pengalaman-page'); 
    }

    public function create_pengalaman()
    {
        return view('dosen.profil.create-pengalaman'); 
    }

    public function delete_pengalaman($id)
    {
        return redirect()->back()->with('success', 'Pengalaman berhasil dihapus.');
    }


}
