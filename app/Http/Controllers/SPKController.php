<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreferensiBidangModel;
use App\Models\SPKMatriksModel;
use App\Models\ViewSPKMatriksModel;
use App\Models\CriteriaModel;
use App\Models\SPKNormalisasiModel;
use App\Models\SPKBobotModel;
use App\Models\SPKNilaiOptimasiModel;
use App\Models\ViewSPKMatriksNormalisasiModel;
use App\Models\ViewSPKMatriksBobotModel;
use App\Models\ViewSPKMatriksNilaiOptimasiModel;
use App\Models\BidangModel;
use App\Models\PenyelenggaraModel;
use App\Models\HadiahModel;
use App\Models\BiayaPendaftaranModel;
use App\Models\TingkatKompetisiModel;
use Yajra\DataTables\Facades\DataTables;

class SPKController extends Controller
{
    public function rekomendasiLombaIndex()
    {


        return view('admin.rekomendasiLomba.index');
    }

    public function rekomendasiListMahasiswa()
    {
        $mahasiswa = ViewSPKMatriksModel::all();

        return DataTables::of($mahasiswa)
            ->addIndexColumn()
            ->addColumn('aksi', function ($mahasiswa) {
                $btn = '<a href="' . url('admin/rekomendasi-lomba/lihat/' . $mahasiswa->id_mahasiswa) . '" class="btn btn-info btn-sm">Lihat Rekomendasi</a>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function rekomendasiLombaLihat(string $id)
    {
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

        // === Ambil hasil view ===
        $spkNormalisasi = ViewSPKMatriksNormalisasiModel::where('id_mahasiswa', $id)->get();
        $spkBobot = ViewSPKMatriksBobotModel::where('id_mahasiswa', $id)->get();
        $spkNilaiOptimasi = ViewSPKMatriksNilaiOptimasiModel::where('id_mahasiswa', $id)->get();
        $spkNilaiOptimasi = $spkNilaiOptimasi->sortByDesc('nilai_optimasi');

        if ($spkNormalisasi->isEmpty() || $spkBobot->isEmpty() || $spkNilaiOptimasi->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Data hasil perhitungan belum tersedia.',
                'message' => 'Data hasil perhitungan belum tersedia.',
            ]);
        }


        return view('admin.rekomendasiLomba.lihatRekomendasi', [
            'lombaList' => $lombaList,
            'spkNormalisasi' => $spkNormalisasi,
            'spkBobot' => $spkBobot,
            'spkNilaiOptimasi' => $spkNilaiOptimasi,
        ]);
    }
}
