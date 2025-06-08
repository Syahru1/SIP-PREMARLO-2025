<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrestasiModel;
use Yajra\DataTables\Facades\DataTables;

class PrestasiController extends Controller
{
    // Verifikasi Prestasi
    public function verifikasiPrestasiIndex()
    {

        return view('admin.verifikasiPrestasi.index');
    }

    public function verifikasiPrestasiList()
    {
        $prestasi = PrestasiModel::with(['prodi', 'periode', 'mahasiswa', 'dosen']);

        return DataTables::of($prestasi)
            ->addIndexColumn()
            ->addColumn('badge', function ($prestasi) {
                return '<span class="badge badge-primary">' . htmlspecialchars($prestasi->status) . '</span>';
            })
            ->addColumn('aksi', function ($prestasi) {
                $btn = '<a href="' . url('/admin/verifikasi-prestasi/detail/' . $prestasi->id_prestasi) . '" class="btn btn-outline-primary btn-sm">Lihat Detail Prestasi</a>';
                return $btn;
            })
            ->rawColumns(['aksi', 'badge'])
            ->make(true);
    }

    public function verifikasiPrestasiDetail($id)
    {
        $prestasi = PrestasiModel::find($id);

        if (!$prestasi) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data prestasi tidak ditemukan',
                ]);
            }

        return view('admin.verifikasiPrestasi.detailPrestasi', ['prestasi' => $prestasi]);
    }

    public function verifikasiPrestasi(Request $request, $id)
    {
        try {
            $prestasi = PrestasiModel::findOrFail($id);

            $prestasi->status = $request->status;
            $prestasi->catatan = $request->catatan;
            $prestasi->save();

            return redirect('/admin/verifikasi-prestasi')->with('success', "Berhasil mengubah status menjadi {$request->status}");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal melakukan verifikasi.');
        }
    }


}
