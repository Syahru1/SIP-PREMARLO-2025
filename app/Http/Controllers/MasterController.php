<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrestasiModel;

class MasterController extends Controller
{
    public function dosen()
    {
        $peringkatMahasiswa = PrestasiModel::with(['mahasiswa', 'prodi'])
        ->where('status', 'Sudah Diverifikasi')
        ->get()
        ->groupBy('id_mahasiswa')
        ->map(function ($prestasi) {
            $first = $prestasi->first();
            return [
                'nama' => $first->mahasiswa->nama,
                'program_studi' => $first->prodi->nama_prodi,
                'jumlah_prestasi' => $prestasi->count(),
                'total_skor' => $prestasi->sum('skor'),
            ];
        })
        ->sortByDesc('total_skor')
        ->values();

        return view('dosen.beranda.index',[
            "title" => "Dashboard",
            "peringkatMahasiswa" => $peringkatMahasiswa
        ]);
        // if (auth()->user()->role == 'Owner') {
        // }

        return redirect()->back();
    }

    public function admin()
    {
        $peringkatMahasiswa = PrestasiModel::with(['mahasiswa', 'prodi'])
        ->where('status', 'Sudah Diverifikasi')
        ->get()
        ->groupBy('id_mahasiswa')
        ->map(function ($prestasi) {
            $first = $prestasi->first();
            return [
                'nama' => $first->mahasiswa->nama,
                'program_studi' => $first->prodi->nama_prodi,
                'jumlah_prestasi' => $prestasi->count(),
                'total_skor' => $prestasi->sum('skor'),
            ];
        })
        ->sortByDesc('total_skor')
        ->values();

        return view('admin.beranda.index',[
            "title" => "Dashboard",
            "peringkatMahasiswa" => $peringkatMahasiswa
        ]);
        // if (auth()->user()->role == 'Admin') {
        // }

        return redirect()->back();
    }

    public function mahasiswa()
    {
        $peringkatMahasiswa = PrestasiModel::with(['mahasiswa', 'prodi'])
        ->where('status', 'Sudah Diverifikasi')
        ->get()
        ->groupBy('id_mahasiswa')
        ->map(function ($prestasi) {
            $first = $prestasi->first();
            return [
                'nama' => $first->mahasiswa->nama,
                'program_studi' => $first->prodi->nama_prodi,
                'jumlah_prestasi' => $prestasi->count(),
                'total_skor' => $prestasi->sum('skor'),
            ];
        })
        ->sortByDesc('total_skor')
        ->values();
        return view('mahasiswa.beranda.index',[
            "title" => "Dashboard",
            "peringkatMahasiswa" => $peringkatMahasiswa
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
