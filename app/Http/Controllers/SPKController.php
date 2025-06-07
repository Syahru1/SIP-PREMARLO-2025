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

    public function rekomendasiLombaLihat(String $id)
    {
        // Ambil semua data lomba (SPKMatriksModel) yang sesuai dengan id_mahasiswa yang dikirim
        $lombaList = SPKMatriksModel::where('id_mahasiswa', $id)->get();

        if ($lombaList->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Data lomba tidak ditemukan untuk mahasiswa ini',
            ]);
        }

        // Daftar sub kriteria yang digunakan (pastikan sesuai dengan kolom di SPKMatriksModel)
        $subKriteria = ['bidang', 'penyelenggara', 'biaya_pendaftaran', 'tingkat_kompetisi', 'hadiah'];

        // Ambil semua kriteria (pastikan sesuai dengan kolom di CriteriaModel)
        $kriteria = CriteriaModel::all()->keyBy('kode_kriteria');

        // Tahap 1: Matriks Normalisasi per sub kriteria
        $normalisasi = [];
        $pembagi = [];
        foreach ($subKriteria as $sub) {
            $pembagi[$sub] = sqrt($lombaList->sum(function ($item) use ($sub) {
                return pow($item->$sub, 2);
            }));
        }

        // Insert/update ke tabel normalisasi SEKALI per lomba, tiap kolom sub kriteria
        foreach ($lombaList as $lomba) {
            $dataNormalisasi = [];
            foreach ($subKriteria as $sub) {
                $nilaiNormalisasi = $pembagi[$sub] != 0 ? $lomba->$sub / $pembagi[$sub] : 0;
                $normalisasi[$lomba->id_lomba][$sub] = $nilaiNormalisasi;
                $dataNormalisasi[$sub] = $nilaiNormalisasi;
            }
            // Insert/update ke tabel normalisasi (kolom: bidang, penyelenggara, biaya_pendaftaran, tingkat_kompetisi, hadiah)
            SPKNormalisasiModel::updateOrCreate(
                [
                    'id_mahasiswa' => $lomba->id_mahasiswa,
                    'id_lomba' => $lomba->id_lomba,
                ],
                $dataNormalisasi
            );
        }

        // Tahap 2: Matriks Normalisasi Terbobot (mengalikan normalisasi dengan bobot per sub kriteria)
        $normalisasiTerbobot = [];
        foreach ($lombaList as $lomba) {
            $dataBobot = [];
            foreach ($subKriteria as $sub) {
                $bobot = isset($kriteria[$sub]) ? $kriteria[$sub]->bobot : 1;
                $nilaiTerbobot = $normalisasi[$lomba->id_lomba][$sub] * $bobot;
                $normalisasiTerbobot[$lomba->id_lomba][$sub] = $nilaiTerbobot;
                $dataBobot[$sub] = $nilaiTerbobot;
            }
            // Insert/update ke tabel bobot (kolom: bidang, penyelenggara, biaya_pendaftaran, tingkat_kompetisi, hadiah)
            SPKBobotModel::updateOrCreate(
                [
                    'id_mahasiswa' => $lomba->id_mahasiswa,
                    'id_lomba' => $lomba->id_lomba,
                ],
                $dataBobot
            );
        }

        // Tahap 3: Hitung Nilai Optimasi (Yi) dan Pemeringkatan
        $hasilMoora = [];
        foreach ($lombaList as $lomba) {
            $benefit = 0;
            $cost = 0;
            foreach ($subKriteria as $sub) {
                $value = $normalisasiTerbobot[$lomba->id_lomba][$sub];
                $atribut = isset($kriteria[$sub]) ? $kriteria[$sub]->atribut : 'benefit';
                if ($atribut == 'benefit') {
                    $benefit += $value;
                } else {
                    $cost += $value;
                }
            }
            $nilai = $benefit - $cost;
            $hasilMoora[] = [
                'lomba' => $lomba,
                'nilai' => $nilai,
            ];

            // Insert/update ke tabel nilai optimasi (kolom: nilai)
            SPKNilaiOptimasiModel::updateOrCreate(
                [
                    'id_mahasiswa' => $lomba->id_mahasiswa,
                    'id_lomba' => $lomba->id_lomba,
                ],
                [
                    'nilai' => $nilai,
                ]
            );
        }

        // Pemeringkatan: urutkan hasil Moora
        usort($hasilMoora, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // Tambahkan ranking ke hasilMoora
        foreach ($hasilMoora as $i => &$row) {
            $row['ranking'] = $i + 1;
        }

        $spkNormalisasi = ViewSPKMatriksNormalisasiModel::where('id_mahasiswa', $id)->get();

        if ($spkNormalisasi->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Data lomba tidak ditemukan untuk mahasiswa ini',
            ]);
        }
        
        $spkBobot = ViewSPKMatriksBobotModel::where('id_mahasiswa', $id)->get();

        if ($spkBobot->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Data lomba tidak ditemukan untuk mahasiswa ini',
            ]);
        }

        $spkNilaiOptimasi = ViewSPKMatriksNilaiOptimasiModel::where('id_mahasiswa', $id)->get();

        if ($spkNilaiOptimasi->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Data lomba tidak ditemukan untuk mahasiswa ini',
            ]);
        }
        // Kirim data tahap perhitungan ke view
        return view('admin.rekomendasiLomba.lihatRekomendasi', [
            'lombaList' => $lombaList,
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'pembagi' => $pembagi,
            'spkNormalisasi' => $spkNormalisasi,
            'spkBobot' => $spkBobot,
            'spkNilaiOptimasi' => $spkNilaiOptimasi,
            'hasilMoora' => $hasilMoora,
        ]);
    }
}
