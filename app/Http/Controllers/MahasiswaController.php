<?php

namespace App\Http\Controllers;

use App\Models\BiayaPendaftaranModel;
use App\Models\BidangLombaModel;
use App\Models\BidangModel;
use App\Models\HadiahModel;
use App\Models\LombaModel;
use App\Models\PenyelenggaraModel;
use App\Models\TingkatKompetisiModel;
use Illuminate\Http\Request;
use App\Models\SPKMatriksModel;
use App\Models\SPKNormalisasiModel;
use App\Models\SPKBobotModel;
use App\Models\SPKNilaiOptimasiModel;
use App\Models\CriteriaModel;
use Illuminate\Support\Facades\DB;
use App\Models\ViewSPKMatriksNilaiOptimasiModel;
use App\Models\PrestasiModel;
use App\Models\ProdiModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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

        $dosen = \App\Models\DosenModel::all();
        $periode = \App\Models\PeriodeModel::all();

        return view('mahasiswa.prestasi.index', compact('prestasi', 'semuaRiwayat', 'dosen', 'periode'));
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


public function editPrestasi($id)
{
    $prestasi = PrestasiModel::with([ 'dosen', 'mahasiswa', 'prodi', 'periode'])
        ->findOrFail($id);

    $dosen = \App\Models\DosenModel::all();
    $periode = \App\Models\PeriodeModel::all();

    return view('mahasiswa.prestasi.edit-prestasi', [
        'prestasi' => $prestasi,
        'dosen' => $dosen,
        'periode' => $periode
    ]);
}

    public function updatePrestasi(Request $request, $id)
    {
        $request->validate([
            'juara_kompetisi' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'juara_kompetisi' => 'required|string|max:255',
            'jenis_prestasi' => 'required|string|max:255',
            'tingkat_kompetisi' => 'required|string|max:255',
            'lokasi_kompetisi' => 'required|string|max:255',
            'tanggal_surat_tugas' => 'required|date',
            'tanggal_kompetisi' => 'required|date',
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_periode' => 'required|exists:periode,id_periode',
            'jumlah_univ'=> 'required|integer|min:1',
            'nomor_sertifikat' => 'required|string|max:255',
            'link_perlombaan' => 'required|url|max:255',
            'foto_sertifikat' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $prestasi = PrestasiModel::findOrFail($id);

        // Handle file upload if provided
        if ($request->hasFile('foto_sertifikat')) {
            // Delete old file if exists
            if ($prestasi->foto_sertifikat && Storage::disk('public')->exists('uploads/prestasi/' . $prestasi->foto_sertifikat)) {
                Storage::disk('public')->delete('uploads/prestasi/' . $prestasi->foto_sertifikat);
            }
            $file = $request->file('foto_sertifikat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads/prestasi', $filename, 'public');
            $request->merge(['foto_sertifikat' => $filename]);
        } else {
            // Keep the existing file name if no new file uploaded
            $request->merge(['foto_sertifikat' => $prestasi->foto_sertifikat]);
        }

        $request->merge(['id_mahasiswa' => auth()->guard('mahasiswa')->user()->id_mahasiswa]);
        $prestasi->status = 'Belum Diverifikasi';
        $prestasi->update($request->all());

        return redirect('mahasiswa/prestasi?tab=riwayat')->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function storePrestasi(Request $request)
    {
        $request->validate([
            'juara_kompetisi' => 'required|string|max:100',
            'nama_kompetisi' => 'required|string|max:255',
            'posisi' => 'required|string|max:100',
            'tingkat_kompetisi' => 'required|string|max:100',
            'jenis_prestasi' => 'required|string|max:100',
            'nama_kompetisi' => 'required|string|max:255',
            'lokasi_kompetisi' => 'required|string|max:255',
            'tanggal_surat_tugas' => 'required|date',
            'tanggal_kompetisi' => 'required|date',
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_periode' => 'required|exists:periode,id_periode',
            'jumlah_univ' => 'required|integer|min:1',
            'nomor_sertifikat' => 'required|string|max:255',
            'link_perlombaan' => 'required|url|max:255',
            'foto_sertifikat' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        try {
            $prestasi = new PrestasiModel();

            $prestasi->juara_kompetisi = $request->juara_kompetisi;
            $prestasi->id_mahasiswa = Auth::guard('mahasiswa')->user()->id_mahasiswa;
            $prestasi->posisi = $request->posisi;
            $prestasi->tingkat_kompetisi = $request->tingkat_kompetisi;
            $prestasi->jenis_prestasi = $request->jenis_prestasi;
            $prestasi->nama_kompetisi = $request->nama_kompetisi;
            $prestasi->lokasi_kompetisi = $request->lokasi_kompetisi;
            $prestasi->tanggal_surat_tugas = $request->tanggal_surat_tugas;
            $prestasi->tanggal_kompetisi = $request->tanggal_kompetisi;
            $prestasi->id_dosen = $request->id_dosen;
            $prestasi->id_periode = $request->id_periode;
            $prestasi->jumlah_univ = $request->jumlah_univ;
            $prestasi->nomor_sertifikat = $request->nomor_sertifikat;
            $prestasi->link_perlombaan = $request->link_perlombaan;
            $prestasi->id_prodi = ProdiModel::where('id_prodi', Auth::guard('mahasiswa')->user()->id_prodi)->value('id_prodi');
            $prestasi->status = 'Belum Diverifikasi';
            $prestasi->skor = 0;
            $prestasi->catatan = null;
            $prestasi->tanggal_pengajuan = now();

            // Simpan foto sertifikat
            if ($request->hasFile('foto_sertifikat')) {
                $file = $request->file('foto_sertifikat');
                $gambar = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/prestasi'), $gambar);
                $prestasi->foto_sertifikat = 'uploads/prestasi/' . $gambar;
            }


            $prestasi->save();

            return redirect('mahasiswa/prestasi')->with('success', 'Data prestasi berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal simpan prestasi: '.$e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: '.$e->getMessage()
            ], 500);
        }
    }


    public function lomba()
    {
        // Get the ID of the logged-in user
        $id = auth()->id();

        // Retrieve lomba data for this specific user
        $lombaList = SPKMatriksModel::where('id_mahasiswa', $id)->get();

        if ($lombaList->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Data lomba tidak ditemukan untuk mahasiswa ini',
            ]);
        }

        // === Ambil semua data kriteria dan bobot ===
        $kriteria = CriteriaModel::all()->keyBy('nama_kriteria');

        // === LANGKAH 1: Hitung Pembagi untuk Normalisasi ===
        $pembagi = [
            'bidang' => sqrt($lombaList->sum(fn($row) => pow($row->bidang, 2))),
            'penyelenggara' => sqrt($lombaList->sum(fn($row) => pow($row->penyelenggara, 2))),
            'biaya_pendaftaran' => sqrt($lombaList->sum(fn($row) => pow($row->biaya_pendaftaran, 2))),
            'tingkat_kompetisi' => sqrt($lombaList->sum(fn($row) => pow($row->tingkat_kompetisi, 2))),
            'hadiah' => sqrt($lombaList->sum(fn($row) => pow($row->hadiah, 2))),
        ];

        // === LANGKAH 2: Normalisasi Matriks dan Simpan ===
        foreach ($lombaList as $row) {
            SPKNormalisasiModel::updateOrCreate([
                'id_mahasiswa' => $id,
                'id_lomba' => $row->id_lomba,
            ], [
                'bidang' => $row->bidang / ($pembagi['bidang'] ?: 1),
                'penyelenggara' => $row->penyelenggara / ($pembagi['penyelenggara'] ?: 1),
                'biaya_pendaftaran' => $row->biaya_pendaftaran / ($pembagi['biaya_pendaftaran'] ?: 1),
                'tingkat_kompetisi' => $row->tingkat_kompetisi / ($pembagi['tingkat_kompetisi'] ?: 1),
                'hadiah' => $row->hadiah / ($pembagi['hadiah'] ?: 1),
            ]);
        }

        // === LANGKAH 3: Normalisasi Terbobot ===
        foreach ($lombaList as $row) {
            $n = SPKNormalisasiModel::where([
                'id_mahasiswa' => $id,
                'id_lomba' => $row->id_lomba,
            ])->first();

            SPKBobotModel::updateOrCreate([
                'id_mahasiswa' => $id,
                'id_lomba' => $row->id_lomba,
            ], [
                'bidang' => $n->bidang * $kriteria['Bidang']->bobot_kriteria,
                'penyelenggara' => $n->penyelenggara * $kriteria['Penyelenggara']->bobot_kriteria,
                'biaya_pendaftaran' => $n->biaya_pendaftaran * $kriteria['Biaya Pendaftaran']->bobot_kriteria,
                'tingkat_kompetisi' => $n->tingkat_kompetisi * $kriteria['Tingkat Kompetisi']->bobot_kriteria,
                'hadiah' => $n->hadiah * $kriteria['Hadiah']->bobot_kriteria,
            ]);
        }

        // === LANGKAH 4: Hitung Nilai Optimasi MOORA ===
        foreach ($lombaList as $row) {
            $b = SPKBobotModel::where([
                'id_mahasiswa' => $id,
                'id_lomba' => $row->id_lomba,
            ])->first();

            $benefit = 0;
            $cost = 0;

            $map = [
                'Bidang' => 'bidang',
                'Penyelenggara' => 'penyelenggara',
                'Tingkat Kompetisi' => 'tingkat_kompetisi',
                'Hadiah' => 'hadiah',
            ];

            foreach ($map as $namaKriteria => $namaKolom) {
                if ($kriteria[$namaKriteria]->jenis_kriteria === 'Benefit') {
                    $benefit += $b->$namaKolom;
                } else {
                    $cost += $b->$namaKolom;
                }
            }

            if ($kriteria['Biaya Pendaftaran']->jenis_kriteria == 'Cost') {
                $cost += $b->biaya_pendaftaran;
            } else {
                $benefit += $b->biaya_pendaftaran;
            }
            $nilaiOptimasi = $benefit - $cost;

            SPKNilaiOptimasiModel::updateOrCreate([
                'id_mahasiswa' => $id,
                'id_lomba' => $row->id_lomba,
            ], [
                'nilai_optimasi' => $nilaiOptimasi,
            ]);
        }

        $spkNilaiOptimasi = ViewSPKMatriksNilaiOptimasiModel::where('id_mahasiswa', $id)->get();
        $spkNilaiOptimasi = $spkNilaiOptimasi->sortByDesc('nilai_optimasi');
        $penyelenggara = PenyelenggaraModel::all();
        $biayaPendaftaran = BiayaPendaftaranModel::all();
        $tingkatKompetisi = TingkatKompetisiModel::all();
        $hadiah = HadiahModel::all();
        $bidang = BidangModel::all();
        $l = LombaModel::select(LombaModel::raw('MAX(RIGHT(kode_lomba,3)) as kode'));
        $kd = "";
        if ($l->count() > 0) {
            foreach ($l->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd;
        }
        // Pass the data to the view
        return view('mahasiswa.lomba.index', [
            'lombaList' => $spkNilaiOptimasi,
            'penyelenggara' => $penyelenggara,
            'biayaPendaftaran' => $biayaPendaftaran,
            'tingkatKompetisi' => $tingkatKompetisi,
            'hadiah' => $hadiah,
            'kodeLomba' => 'LMB' . $kd,
            'bidang' => $bidang
        ]);
    }

    public function storeLomba(Request $request)
    {
        $request->validate([
            'kode_lomba' => 'required',
            'nama_lomba' => 'required',
            'tingkat_kompetisi' => 'required',
            'penyelenggara' => 'required',
            'biaya_pendaftaran' => 'required',
            'hadiah' => 'required',
            'tanggal_pendaftaran' => 'required',
            'lokasi' => 'required',
            'link' => 'required',
            'deskripsi_lomba' => 'required',
            'bidang' => 'required|array',
        ]);

        // Pisah tanggal dari flatpickr
        [$tgl_mulai, $tgl_akhir] = explode(' to ', $request->tanggal_pendaftaran);
        // Upload gambar (jika ada)
        $gambar = null;
        if ($request->hasFile('gambar_lomba')) {
            $file = $request->file('gambar_lomba');
            $gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/lomba'), $gambar);
        }

        $bidang_ids_str = implode(',', $request->bidang);

        // Set default status jika tidak dikirim dari form
        $statusLomba = $request->status_lomba ?? 'Masih Berlangsung';
        $statusVerifikasi = $request->status_verifikasi ?? 'Belum Diverifikasi';
        // dd($statusLomba, $statusVerifikasi);

        // Panggil Stored Procedure
        DB::statement("CALL sp_insert_lomba_dan_bidang(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
            $request->kode_lomba,
            $request->nama_lomba,
            $request->tingkat_kompetisi,
            $request->penyelenggara,
            $request->biaya_pendaftaran,
            $request->hadiah,
            $tgl_mulai,
            $tgl_akhir,
            $request->lokasi,
            $request->link,
            $request->deskripsi_lomba,
            $statusLomba,
            $statusVerifikasi,
            $gambar,
            $bidang_ids_str
        ]);

        return redirect('mahasiswa/lomba')->with('success', 'Lomba berhasil ditambahkan.');
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
