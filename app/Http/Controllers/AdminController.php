<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\AdminModel;
use App\Models\DosenModel;
use App\Models\PeriodeModel;
use App\Models\ProdiModel;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    // Kelola Data Lomba
    public function kelolaDataLombaIndex()
    {
        return view('admin.kelolaDataLomba.index');
    }

    public function kelolaDataLombaTambah()
    {
        return view('admin.kelolaDataLomba.tambahLomba');
    }

    public function kelolaDataLombaEdit()
    {
        return view('admin.kelolaDataLomba.editLomba');
    }

    // Kelola Periode
    public function kelolaPeriodeIndex()
    {
        return view('admin.kelolaPeriode.index');
    }

    public function kelolaPeriodeList(Request $request)
    {
        $periode = PeriodeModel::select('id_periode', 'nama_periode');

        return DataTables::of($periode)
            ->addIndexColumn()
            ->addColumn('aksi', function ($periode) {
                $btn = '<button onclick="modalAction(\'' . url('admin/kelola-periode/edit/' . $periode->id_periode) . '\')" class="btn btn-warning btn-sm" data-toggle="modal">Edit</button>';
                $btn .= '<button onclick="modalAction(\'' . url('admin/kelola-periode/confirm-delete/' . $periode->id_periode) . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function kelolaPeriodeTambah()
    {
        $periode = PeriodeModel::select('id_periode', 'nama_periode')->get();
        return view('admin.kelolaPeriode.tambahPeriode')->with('periode', $periode);
    }

    public function kelolaPeriodeStore(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'nama_periode' => 'required|string|max:255',
            ]);

            $periode = PeriodeModel::create([
                'nama_periode' => $request->nama_periode
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data periode berhasil disimpan.'
            ]);
        }

        return redirect('admin/kelola-periode');
    }


    public function kelolaPeriodeEdit(string $id)
    {
            $periode = PeriodeModel::find($id);

            if (!$periode) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode tidak ditemukan',
                ]);
            }

            return view('admin.kelolaPeriode.editPeriode', ['periode' => $periode]);
        }

        public function kelolaPeriodeUpdate(Request $request, string $id)
        {
            $request->validate([
                'nama_periode' => 'required|string|max:255',
            ]);

            $periode = PeriodeModel::find($id);
            if (!$periode) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode tidak ditemukan',
                ]);
            }

            $periode->update([
                'nama_periode' => $request->input('nama_periode'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data periode berhasil diperbarui',
            ]);
    }


    public function kelolaPeriodeConfirmDelete($id)
    {
        $periode = PeriodeModel::find($id);

        if (!$periode) {
            return response()->json([
                'status' => false,
                'message' => 'Data periode tidak ditemukan',
            ]);
        }

        return view('admin.kelolaPeriode.confirmDelete', compact('periode'));
    }


    public function kelolaPeriodeDelete(string $id)
    {
        if (request()->ajax() || request()->wantsJson()) {
            $periode = PeriodeModel::find($id);
            if ($periode) {
                $periode->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data periode berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode tidak ditemukan'
                ]);
            }
        }

        return redirect('admin/kelola-periode');
    }

    public function kelolaPeriodeDestroy(string $id)
    {
        $periode = PeriodeModel::find($id);
        if ($periode) {
            $periode->delete();
            return redirect('admin/kelola-periode')->with('success', 'Data periode berhasil dihapus');
        } else {
            return redirect('admin/kelola-periode')->with('error', 'Data periode tidak ditemukan');
        }
    }

    // Kelola Prodi
    public function kelolaProdiIndex()
    {
        return view('admin.kelolaProdi.index');
    }

    public function kelolaProdiList()
    {
        $prodi = ProdiModel::select('id_prodi', 'kode_prodi', 'nama_prodi');

        return DataTables::of($prodi)
            ->addIndexColumn()
            ->addColumn('aksi', function ($prodi) {
                $btn = '<button onclick="modalAction(\'' . url('admin/kelola-prodi/edit/' . $prodi->id_prodi) . '\')" class="btn btn-warning btn-sm" data-toggle="modal">Edit</button>';
                $btn .= '<button onclick="modalAction(\'' . url('admin/kelola-prodi/confirm-delete/' . $prodi->id_prodi) . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }



    public function kelolaProdiTambah()
    {
        $prodi = ProdiModel::select('id_prodi', 'kode_prodi', 'nama_prodi')->get();
        return view('admin.kelolaProdi.tambahProdi')->with('prodi', $prodi);
    }

    public function kelolaProdiStore(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'kode_prodi' => 'required|string|max:255',
                'nama_prodi' => 'required|string|max:255',
            ]);

            ProdiModel::create([
                'kode_prodi' => $request->input('kode_prodi'),
                'nama_prodi' => $request->input('nama_prodi'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data prodi berhasil disimpan.'
            ]);
        }

        return redirect('admin/kelola-prodi');
    }

    public function kelolaProdiEdit(string $id)
    {
        $prodi = ProdiModel::find($id);

        if (!$prodi) {
            return response()->json([
                'status' => false,
                'message' => 'Data prodi tidak ditemukan',
            ]);
        }

        return view('admin.kelolaProdi.editProdi', ['prodi' => $prodi]);
    }

    public function kelolaProdiUpdate(Request $request, string $id)
    {

        $request->validate([
                'kode_prodi' => 'required|string|max:255',
                'nama_prodi' => 'required|string|max:255',
            ]);

            $prodi = ProdiModel::find($id);
            if (!$prodi) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data prodi tidak ditemukan',
                ]);
            }

            $prodi->update([
                'kode_prodi' => $request->input('kode_prodi'),
                'nama_prodi' => $request->input('nama_prodi'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data prodi berhasil diperbarui',
            ]);
    }

    public function kelolaProdiConfirmDelete($id)
    {
        $prodi = ProdiModel::find($id);

        if (!$prodi) {
            return response()->json([
                'status' => false,
                'message' => 'Data prodi tidak ditemukan',
            ]);
        }

        return view('admin.kelolaProdi.confirmDelete', compact('prodi'));
    }

    public function kelolaProdiDelete(string $id)
    {
        if (request()->ajax() || request()->wantsJson()) {
            $prodi = ProdiModel::find($id);
            if ($prodi) {
                $prodi->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data prodi berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data prodi tidak ditemukan'
                ]);
            }
        }

        return redirect('admin/kelola-prodi');
    }

    public function kelolaProdiDestroy(string $id)
    {
        $prodi = ProdiModel::find($id);
        if ($prodi) {
            $prodi->delete();
            return redirect('admin/kelola-prodi')->with('success', 'Data prodi berhasil dihapus');
        } else {
            return redirect('admin/kelola-prodi')->with('error', 'Data prodi tidak ditemukan');
        }
    }

     // Laporan Analisis Prestasi
    public function laporanAnalisisPrestasiIndex()
    {
        return view('admin.laporanAnalisisPrestasi.index');
    }

    // Rekomendasi Lomba
    public function rekomendasiLombaIndex()
    {
        return view('admin.rekomendasiLomba.index');
    }

    public function rekomendasiLombaLihat()
    {
        return view('admin.rekomendasiLomba.lihatRekomendasi');
    }

    public function laporanAnalisisPrestasiDetail()
    {
        return view('admin.laporanAnalisisPrestasi.detailPrestasi');
    }

    // Profile
    public function profileIndex()
    {
        return view('admin.profile.index');
    }

    public function profileEdit()
    {
        return view('admin.profile.editProfile');
    }

    // Verifikasi Lomba
    public function verifikasiLombaIndex()
    {
        return view('admin.verifikasiLomba.index');
    }

    public function verifikasiLombaDetail()
    {
        return view('admin.verifikasiLomba.detailLomba');
    }

    // Verifikasi Prestasi
    public function verifikasiPrestasiIndex()
    {
        return view('admin.verifikasiPrestasi.index');
    }

    public function verifikasiPrestasiDetail()
    {
        return view('admin.verifikasiPrestasi.detailPrestasi');
    }
}
