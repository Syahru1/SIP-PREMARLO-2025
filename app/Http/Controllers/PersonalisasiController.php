<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalisasiController extends Controller
{
     public function test() {
        session(['show_personalisasi' => true]);

        $bidang = DB::table('c_bidang')->orderBy('nama_bidang', 'asc')->get();
        $biaya = DB::table('c_biaya_pendaftaran')->get();
        $penyelenggara = DB::table('c_penyelenggara')->get();
        $tingkat = DB::table('c_tingkat_kompetisi')->get();
        $hadiah = DB::table('c_hadiah')->get();

        return view('mahasiswa.personalisasi.index', compact('bidang', 'biaya', 'penyelenggara', 'tingkat', 'hadiah'));
    }


    public function submit(Request $request)
    {
        // Validasi & simpan preferensi sesuai kebutuhan
        return back()->with('success', 'Preferensi berhasil disimpan!');
    }

}
