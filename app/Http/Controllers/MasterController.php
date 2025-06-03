<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function dosen()
    {
        return view('dosen.beranda.index',[
            "title" => "Dashboard"
        ]);
        // if (auth()->user()->role == 'Owner') {
        // }

        return redirect()->back();
    }

    public function admin()
    {
        return view('admin.beranda.index',[
            "title" => "Dashboard"
        ]);
        // if (auth()->user()->role == 'Admin') {
        // }

        return redirect()->back();
    }

    public function mahasiswa()
    {
        return view('mahasiswa.beranda.index',[
            "title" => "Dashboard"
        ]);
        // if (auth()->user()->role == 'Kasir') {
        // }

        return redirect()->back();
    }

    public function index()
    {
        return view('general.landing');
    }
}
