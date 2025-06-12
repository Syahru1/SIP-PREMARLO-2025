<?php

namespace App\Http\Controllers;

use App\Models\LombaModel;
use App\Models\BidangLombaModel;
use Illuminate\Support\Facades\DB;
use App\Models\PenyelenggaraModel;
use App\Models\BiayaPendaftaranModel;
use App\Models\TingkatKompetisiModel;
use App\Models\HadiahModel;
use App\Models\BidangModel;
use App\Models\PengajuanDospemModel;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function beranda()
    {
        return view('dosen.beranda.index');
    }

    public function mahasiswa_bimbingan()
    {
        $dosen = auth()->user();

        $bimbinganMahasiswaList = PengajuanDospemModel::where('id_dosen', $dosen->id_dosen)
            ->where('status', 'Disetujui')
            ->with(['mahasiswa', 'tim.anggota_tim.mahasiswa']) // penting!
            ->get();

        $riwayatBimbinganList = PengajuanDospemModel::where('id_dosen', $dosen->id_dosen)
            ->with(['mahasiswa', 'tim.anggota_tim.mahasiswa'])
            ->get();

        return view('dosen.mahasiswa-bimbingan.index', compact('dosen', 'bimbinganMahasiswaList', 'riwayatBimbinganList'));
    }


    public function profil()
    {
        $dosen = auth()->user();

        return view(
            'dosen.profil.index',
            compact('dosen')
        );
    }

    public function notifikasi()
    {
        return view('dosen.notifikasi');
    }

    public function lomba()
    {
        $lombaList = LombaModel::where('status_verifikasi', 'Diverifikasi')
            ->orderBy('created_at')
            ->get();
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
        // Get filter parameter from request
        $NIDN_filter = request('NIDN_filter', null);
        // Get the logged-in user's NIDN as default
        $loggedInNIDN = auth()->guard('dosen')->user()->nidn;
        // Use the filtered NIDN if provided, otherwise use logged-in user's NIDN
        $filterNIDN = $NIDN_filter ?: $loggedInNIDN;
        // Use NIDN for filtering the lomba data
        $riwayat = LombaModel::where('kode_pemohon', $filterNIDN)
            ->orderByRaw("FIELD(status_verifikasi, 'Belum Diverifikasi', 'Ditolak', 'Diverifikasi')")
            ->get();
        return view('dosen.lomba.index', [
            'lombaList' => $lombaList,
            'penyelenggara' => $penyelenggara,
            'biayaPendaftaran' => $biayaPendaftaran,
            'tingkatKompetisi' => $tingkatKompetisi,
            'hadiah' => $hadiah,
            'kodeLomba' => 'LMB' . $kd,
            'bidang' => $bidang,
            'riwayatLomba' => $riwayat // Pass the filter value to view
        ]);
    }
    public function detail_prestasi()
    {
        return view('dosen.prestasi.detail-prestasi');
    }

    public function detail_lomba(String $id)
    {
        $detailLomba = LombaModel::where('id_lomba', $id)->first();
        $detailBidang = BidangLombaModel::where('id_lomba', $id)->get();
        return view('dosen.lomba.detail-lomba', [
            'detailLomba' => $detailLomba,
            'detailBidang' => $detailBidang
        ]);
    }

    public function storelomba(Request $request)
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
            $nidn = auth()->guard('dosen')->user()->nidn;

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
                $nidn,  // NIM mahasiswa yang login
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

            return redirect()->back()->with('success', 'Lomba berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan lomba');
        }
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

        return view('dosen.lomba.edit_riwayat_lomba', [
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

            return redirect('dosen/lomba')->with('success', 'Lomba berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal melakukan verifikasi.');
        }
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

    public function detail_mahasiswa($id)
    {
        $dospem = PengajuanDospemModel::findOrFail($id);
        return view('dosen.mahasiswa-bimbingan.detail-mahasiswa', compact('dospem'));
    }

    public function detail_mahasiswa_riwayat($id)
    {
        $dospem = PengajuanDospemModel::findOrFail($id);
        return view('dosen.mahasiswa-bimbingan.detail-mahasiswa-riwayat', compact('dospem'));
    }

    public function verifikasi_dospem(Request $request, $id)
    {
        try {
            $dospem = PengajuanDospemModel::findOrFail($id);
            $dospem->status = $request->status;
            $dospem->catatan = $request->catatan;
            $dospem->save();

            return redirect('/dosen/mahasiswa-bimbingan')->with('success', 'Berhasil mengubah status permohonan menjadi ' . $request->status);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal melakukan verifikasi.');
        }
    }
}
