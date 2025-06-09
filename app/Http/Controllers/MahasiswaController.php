<?php

namespace App\Http\Controllers;

use App\Models\BidangLombaModel;
use App\Models\LombaModel;
use Illuminate\Http\Request;
use App\Models\SPKMatriksModel;
use App\Models\ViewSPKMatriksNilaiOptimasiModel;
use App\Models\PrestasiModel;

class MahasiswaController extends Controller
{
    public function beranda()
    {
        return view('mahasiswa.beranda.index');
    }

    public function prestasi()
    {
        $id = auth()->guard('mahasiswa')->user()->id_mahasiswa;

        $prestasi = PrestasiModel::with('periode')
            ->where('id_mahasiswa', $id)
            ->where('status', 'Sudah Diverifikasi')
            ->get();

        $semuaRiwayat = PrestasiModel::with('periode')
            ->where('id_mahasiswa', $id)
            ->get();

        return view('mahasiswa.prestasi.index', compact('prestasi', 'semuaRiwayat'));
    }


    public function pencatatan()
    {
        // misalnya tampilkan form atau draft
        return view('mahasiswa.prestasi.pencatatan');
    }

    public function detailPrestasi($id)
    {
        $data = PrestasiModel::with([ 'dosen', 'mahasiswa', 'prodi', 'periode']) // sesuaikan relasi
            ->findOrFail($id);

        return view('mahasiswa.prestasi.detail-prestasi', compact('data'));
    }

    public function lomba()
    {
        // Get the ID of the logged-in user
        $id = auth()->id();

        // Retrieve lomba data for this specific user
        $lombaList = ViewSPKMatriksNilaiOptimasiModel::where('id_mahasiswa', $id)->get();
        if ($lombaList->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Data lomba tidak ditemukan untuk mahasiswa ini',
            ]);
        }
        $lombaList = $lombaList->sortByDesc('nilai_optimasi');

        // Pass the data to the view
        return view('mahasiswa.lomba.index')->with('lombaList', $lombaList);
    }

    public function detail_lomba(String $id)
    {
        $detailLomba = LombaModel::where('id_lomba', $id)->first();
        $detailBidang = BidangLombaModel::where('id_lomba', $id)->get();
        return view('mahasiswa.lomba.detail-lomba', [
            'detailLomba' => $detailLomba,
            'detailBidang' => $detailBidang
        ]);
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

    public function edit_profil()
    {
    // Data dummy user
    $user = (object)[
        'name' => 'Budi Santoso',
        'lokasi' => 'Jakarta',
        'photo' => 'foto-profil.jpg', // misal ini file sudah ada di storage
    ];

    return view('mahasiswa.profil.edit-profil', compact('user'));
    }


    public function sertifikat()
    {
        return view('mahasiswa.profil.sertifikat-page');
    }

    public function create_sertifikat()
    {
        return view('mahasiswa.profil.create-sertifikat');
    }

    public function delete_sertifikat($id)
    {
    // logika hapus dari database
    // Sertifikat::destroy($id); // jika pakai model
    return redirect()->back()->with('success', 'Sertifikat berhasil dihapus.');
    }

    public function minat()
    {
        return view('mahasiswa.profil.minat-page');
    }

    public function create_minat()
    {
        return view('mahasiswa.profil.create-minat');
    }

    public function delete_minat($id)
    {
    // logika hapus dari database
    // Sertifikat::destroy($id); // jika pakai model
    return redirect()->back()->with('success', 'Minat berhasil dihapus.');
    }

    public function bidang_keahlian()
    {
        return view('mahasiswa.profil.bidang-keahlian-page');
    }

    public function create_bidang_keahlian()
    {
        return view('mahasiswa.profil.create-bidang-keahlian');
    }

    public function delete_bidang_keahlian($id)
    {
    // logika hapus dari database
    // Sertifikat::destroy($id); // jika pakai model
    return redirect()->back()->with('success', 'Bidang keahlian berhasil dihapus.');
    }

    public function pengalaman()
    {
        return view('mahasiswa.profil.pengalaman-page');
    }

    public function create_pengalaman()
    {
        return view('mahasiswa.profil.create-pengalaman');
    }

    public function delete_pengalaman($id)
    {
    // logika hapus dari database
    // Sertifikat::destroy($id); // jika pakai model
    return redirect()->back()->with('success', 'Pengalaman berhasil dihapus.');
    }

}
