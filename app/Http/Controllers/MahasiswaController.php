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
use App\Models\MahasiswaModel;
use App\Models\PreferensiMahasiswaModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\PengajuanDospemModel;
use App\Models\DosenModel;
use App\Models\PreferensiBidangModel;
use Illuminate\Support\Str;

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
        $data = PrestasiModel::with(['dosen', 'mahasiswa', 'prodi', 'periode']) // sesuaikan relasi
            ->findOrFail($id);

        return view('mahasiswa.prestasi.detail-prestasi', compact('data'));
    }


    public function editPrestasi($id)
    {
        $prestasi = PrestasiModel::with(['dosen', 'mahasiswa', 'prodi', 'periode'])
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
            'jumlah_univ' => 'required|integer|min:1',
            'nomor_sertifikat' => 'required|string|max:255',
            'link_perlombaan' => 'required|url|max:255',
            // 'foto_sertifikat' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
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
            Log::error('Gagal simpan prestasi: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }


    public function lomba()
    {
        // Get the ID of the logged-in user
        $id = auth()->id();

        // Retrieve lomba data for this specific user
        $lombaList = SPKMatriksModel::where('id_mahasiswa', $id)->get();

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
        // Get filter parameter from request
        $nim_filter = request('nim_filter', null);

        // Get the logged-in user's NIM as default
        $loggedInNim = auth()->guard('mahasiswa')->user()->nim;

        // Use the filtered NIM if provided, otherwise use logged-in user's NIM
        $filterNim = $nim_filter ?: $loggedInNim;

        // Use NIM for filtering the lomba data
        $riwayat = LombaModel::where('kode_pemohon', $filterNim)
            ->orderByRaw("FIELD(status_verifikasi, 'Belum Diverifikasi', 'Ditolak', 'Diverifikasi')")
            ->get();

        // Continue with existing code...
        $dataLomba = LombaModel::where('status_verifikasi', 'Diverifikasi')
            ->orderBy('created_at')
            ->get();
        return view('mahasiswa.lomba.index', [
            'lombaList' => $spkNilaiOptimasi,
            'penyelenggara' => $penyelenggara,
            'biayaPendaftaran' => $biayaPendaftaran,
            'tingkatKompetisi' => $tingkatKompetisi,
            'hadiah' => $hadiah,
            'kodeLomba' => 'LMB' . $kd,
            'bidang' => $bidang,
            'dataLomba' => $dataLomba,
            'riwayatLomba' => $riwayat // Pass the filter value to view
        ]);
    }

    public function storeLomba(Request $request)
    {
        try {
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
                'gambar_lomba' => 'required',
            ]);

            // Get NIM of logged in mahasiswa
            $nimMahasiswa = auth()->guard('mahasiswa')->user()->nim;

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

            // Panggil Stored Procedure dengan NIM mahasiswa
            DB::statement("CALL sp_insert_lomba_dan_bidang(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $request->kode_lomba,
                $nimMahasiswa,  // NIM mahasiswa yang login
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

            return redirect('mahasiswa/lomba?tab=pengajuan')->with('success', 'Lomba berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect('mahasiswa/lomba?tab=pengajuan')->with('error', 'Gagal menambahkan lomba');
        }
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

    public function edit_lomba(String $id)
    {
        $detailLomba = LombaModel::where('id_lomba', $id)->first();
        $detailBidang = BidangLombaModel::where('id_lomba', $id)->get();
        $penyelenggara = PenyelenggaraModel::all();
        $biayaPendaftaran = BiayaPendaftaranModel::all();
        $tingkatKompetisi = TingkatKompetisiModel::all();
        $hadiah = HadiahModel::all();
        $bidang = BidangModel::all();

        return view('mahasiswa.lomba.edit_riwayat_lomba', [
            'detailLomba' => $detailLomba,
            'detailBidang' => $detailBidang,
            'penyelenggara' => $penyelenggara,
            'biayaPendaftaran' => $biayaPendaftaran,
            'tingkatKompetisi' => $tingkatKompetisi,
            'hadiah' => $hadiah,
            'bidang' => $bidang
        ]);
    }

    public function update_lomba(Request $request, String $id)
    {
        try {
            $request->validate([
                'kode_lomba' => 'required',
                'kode_pemohon' => 'required',
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
            // Check if gambar_lomba is a file input
            if ($request->hasFile('gambar_lomba')) {
                $file = $request->file('gambar_lomba');
                $gambar = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/lomba'), $gambar);
            } else {
                // If not a file input, keep the existing image if there is one
                $existingLomba = LombaModel::find($id);
                $gambar = $existingLomba ? $existingLomba->gambar_lomba : null;
            }

            $bidang_ids_str = implode(',', $request->bidang);

            // Set default status jika tidak dikirim dari form
            $statusLomba = $request->status_lomba ?? 'Masih Berlangsung';
            $statusVerifikasi = $request->status_verifikasi ?? 'Belum Diverifikasi';

            // Panggil Stored Procedure
            DB::statement("CALL sp_update_lomba_dan_bidang(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                $id,
                $request->kode_lomba,
                $request->kode_pemohon,
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

            return redirect('mahasiswa/lomba?tab=riwayat')->with('success', 'Lomba berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal melakukan verifikasi.');
        }
    }

    public function profil()
    {
        $mahasiswa = auth()->user();
        $preferensi = PreferensiMahasiswaModel::where('id_mahasiswa', auth()->user()->id_mahasiswa)->first();
        $detailBidang = PreferensiBidangModel::where('id_mahasiswa', auth()->user()->id_mahasiswa)->get();
        // Ambil data referensi untuk tab lainnya
        $bidang = DB::table('c_bidang')->orderBy('nama_bidang', 'asc')->get();
        $biaya = DB::table('c_biaya_pendaftaran')->get();
        $penyelenggara = DB::table('c_penyelenggara')->get();
        $tingkat = DB::table('c_tingkat_kompetisi')->get();
        $hadiah = DB::table('c_hadiah')->get();

        return view('mahasiswa.profil.index', compact(
            'mahasiswa',
            'preferensi',
            'detailBidang',
            'bidang',
            'biaya',
            'penyelenggara',
            'tingkat',
            'hadiah'
        ));
    }

    public function preferensi()
    {
        // Ambil data referensi untuk dropdown
        $bidang = DB::table('c_bidang')->orderBy('nama_bidang', 'asc')->get();
        $biaya = DB::table('c_biaya_pendaftaran')->get();
        $penyelenggara = DB::table('c_penyelenggara')->get();
        $tingkat = DB::table('c_tingkat_kompetisi')->get();
        $hadiah = DB::table('c_hadiah')->get();

        return view('mahasiswa.personalisasi.index', compact(
            'bidang',
            'biaya',
            'penyelenggara',
            'tingkat',
            'hadiah'
        ));
    }

    public function storePreferensi(Request $request)
    {

        $request->validate([
            'bidang' => 'required|array',
            'biaya_pendaftaran' => 'required',
            'penyelenggara' => 'required',
            'tingkat_kompetisi' => 'required',
            'hadiah' => 'required',
        ]);
        // dd($request->all());
        // Simpan preferensi ke database
        $mahasiswaId = auth()->guard('mahasiswa')->user()->id_mahasiswa;

        // Ubah array bidang menjadi string yang dipisahkan koma
        $bidangList = implode(',', $request->bidang);
        // Panggil stored procedure
        DB::statement('CALL sp_insert_preferensi_mahasiswa_dan_bidang(?, ?, ?, ?, ?, ?)', [
            $mahasiswaId,
            $request->penyelenggara,
            $request->biaya_pendaftaran,
            $request->tingkat_kompetisi,
            $request->hadiah,
            $bidangList
        ]);

        return redirect('mahasiswa/beranda')->with('success', 'Preferensi berhasil disimpan.');
    }

    public function updatePreferensi(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'bidang' => 'required|array',
                'penyelenggara' => 'required',
                'biaya_pendaftaran' => 'required',
                'tingkat_kompetisi' => 'required',
                'hadiah' => 'required',
            ]);

            $mahasiswaId = auth()->guard('mahasiswa')->user()->id_mahasiswa;

            $bidangList = implode(',', $request->bidang);

            // Panggil stored procedure update (param ke-1 sekarang id_preferensi_mahasiswa)
            DB::statement('CALL sp_update_preferensi_mahasiswa_dan_bidang(?, ?, ?, ?, ?, ?, ?)', [
                $id,                    // id_preferensi_mahasiswa (ambil dari URL form)
                $mahasiswaId,
                $request->penyelenggara,
                $request->biaya_pendaftaran,
                $request->tingkat_kompetisi,
                $request->hadiah,
                $bidangList
            ]);

            return redirect()->back()->with('success', 'Preferensi berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui preferensi: ' . $e->getMessage());
        }
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

    public function bimbingan()
    {
        $mahasiswa = auth()->guard('mahasiswa')->user();
        $riwayatBimbinganList = PengajuanDospemModel::where('id_mahasiswa', $mahasiswa->id_mahasiswa)
            ->with(['mahasiswa', 'tim.anggota_tim.mahasiswa'])
            ->get();

        $dosenList = DosenModel::all();
        $anggotaTim = MahasiswaModel::all();

        return view('mahasiswa.bimbingan.index', compact('riwayatBimbinganList', 'dosenList', 'anggotaTim'));
    }

    public function detailPengajuanDospem($id)
    {
        $dospem = PengajuanDospemModel::with(['mahasiswa', 'tim.anggota_tim.mahasiswa'])->findOrFail($id);

        return view('mahasiswa.bimbingan.detail-pengajuan', compact('dospem'));
    }

    public function storePengajuanDospem(Request $request)
    {
        // Validasi input
        $rules = [
            'nama_tim' => 'required|string|max:255',
            'nama_lomba' => 'required|string',
            'deskripsi_lomba' => 'required|string',
            'proposal' => 'required|file|mimes:pdf|max:2048',
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'ketua_tim' => 'required|exists:mahasiswa,id_mahasiswa',
        ];

        // Validasi anggota_1 sampai anggota_4
        for ($i = 1; $i <= 4; $i++) {
            $rules["anggota_$i"] = 'nullable|exists:mahasiswa,id_mahasiswa';
        }

        $request->validate($rules);

        try {
            // Simpan file proposal ke folder uploads/proposal
            if ($request->hasFile('proposal')) {
                $file = $request->file('proposal');
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/proposal'), $namaFile);
                $proposal = $namaFile;
            } else {
                $proposal = null;
            }

            // Ambil data input
            $namaTim = $request->input('nama_tim');
            $namaLomba = $request->input('nama_lomba');
            $deskripsiLomba = $request->input('deskripsi_lomba');
            $idDosen = $request->input('id_dosen');
            $idKetua = auth()->user()->id_mahasiswa;

            // Ambil anggota satu per satu dari form
            $anggota = [];
            for ($i = 1; $i <= 4; $i++) {
                $anggota[] = $request->input("anggota_$i") ?: null;
            }

            // Pad anggota jadi 4 elemen, isi null jika kurang
            $idAnggota = array_pad($anggota, 4, null);

            // Jalankan stored procedure
            DB::statement('CALL sp_buat_pengajuan_dospem(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                $namaTim,
                $namaLomba,
                $deskripsiLomba,
                $proposal,
                $idDosen,
                $idKetua,
                $idAnggota[0],
                $idAnggota[1],
                $idAnggota[2],
                $idAnggota[3],
            ]);

            return redirect('mahasiswa/bimbingan-form')->with('success', 'Pengajuan dospem berhasil dibuat.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function editPengajuanDospem($id)
    {
        $dospem = PengajuanDospemModel::with(['mahasiswa', 'tim.anggota_tim.mahasiswa'])->findOrFail($id);
        $dosenList = DosenModel::all();
        $anggotaTim = MahasiswaModel::all();

        return view('mahasiswa.bimbingan.edit-pengajuan', compact('dospem', 'dosenList', 'anggotaTim'));
    }


public function updatePengajuanDospem(Request $request, $id)
{
    $validated = $request->validate([
        'nama_tim' => 'required|string|max:255',
        'nama_lomba' => 'required|string|max:255',
        'deskripsi_lomba' => 'required|string',
        'proposal' => 'nullable|file|mimes:pdf|max:2048',
        'id_dosen' => 'required|exists:dosen,id_dosen',
        'ketua_tim' => 'required|exists:mahasiswa,id_mahasiswa',
        'anggota_1' => 'nullable|exists:mahasiswa,id_mahasiswa',
        'anggota_2' => 'nullable|exists:mahasiswa,id_mahasiswa',
        'anggota_3' => 'nullable|exists:mahasiswa,id_mahasiswa',
        'anggota_4' => 'nullable|exists:mahasiswa,id_mahasiswa',
    ]);

    try {
        $pengajuan = \App\Models\PengajuanDospemModel::findOrFail($id);

        $anggota = array_filter([
            $validated['anggota_1'] ?? null,
            $validated['anggota_2'] ?? null,
            $validated['anggota_3'] ?? null,
            $validated['anggota_4'] ?? null,
        ]);

        // Cek ketua tidak jadi anggota
        if (in_array($validated['ketua_tim'], $anggota)) {
            return back()->with('error', 'Ketua tim tidak boleh menjadi anggota.');
        }

        // Cek tidak ada duplikat antar anggota
        if (count($anggota) !== count(array_unique($anggota))) {
            return back()->with('error', 'Anggota tim tidak boleh ada yang sama.');
        }

        // Update proposal jika diunggah ulang
        $proposal = $pengajuan->proposal;
        if ($request->hasFile('proposal')) {
            $file = $request->file('proposal');
            if ($file->isValid()) {
                $oldPath = public_path('uploads/proposal/' . $proposal);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
                $namaFile = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/proposal'), $namaFile);
                $proposal = $namaFile;
            }
        }

        // Jalankan SP
        DB::statement('CALL sp_update_pengajuan_dospem(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $id,
            $validated['nama_tim'],
            $validated['nama_lomba'],
            $validated['deskripsi_lomba'],
            $proposal,
            $validated['id_dosen'],
            $validated['ketua_tim'],
            $validated['anggota_1'] ?? null,
            $validated['anggota_2'] ?? null,
            $validated['anggota_3'] ?? null,
            $validated['anggota_4'] ?? null,
        ]);
        

        return redirect('mahasiswa/bimbingan-form')->with('success', 'Pengajuan berhasil diperbarui.');
    } catch (\Throwable $e) {
        Log::error('Gagal update pengajuan #' . $id . ': ' . $e->getMessage());
        return back()->with('error', 'Terjadi kesalahan saat memperbarui pengajuan. Silakan coba lagi.');
    }
}




}
