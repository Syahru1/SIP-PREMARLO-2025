<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\AdminModel;
use App\Models\PeriodeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    // Kelola Pengguna Admin
    public function kelolaAdminIndex()
    {
        return view('admin.kelolaPenggunaAdmin.index');
    }

    public function kelolaAdminTambah()
    {
        return view('admin.kelolaPenggunaAdmin.tambahAdmin');
    }

    public function kelolaAdminEdit()
    {
        return view('admin.kelolaPenggunaAdmin.editAdmin');
    }

    // Kelola Pengguna Dosen
    public function kelolaDosenIndex()
    {
        return view('admin.kelolaPenggunaDosen.index');
    }

    public function kelolaDosenTambah()
    {
        return view('admin.kelolaPenggunaDosen.tambahDosen');
    }

    public function kelolaDosenEdit()
    {
        return view('admin.kelolaPenggunaDosen.editDosen');
    }

    // Kelola Pengguna Mahasiswa
    public function kelolaMahasiswaIndex()
    {
        return view('admin.kelolaPenggunaMahasiswa.index');
    }

    public function kelolaMahasiswaTambah()
    {
        return view('admin.kelolaPenggunaMahasiswa.tambahMahasiswa');
    }

    public function kelolaMahasiswaEdit()
    {
        return view('admin.kelolaPenggunaMahasiswa.editMahasiswa');
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
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('admin/kelola-periode/' . $periode->id_periode) . '">'
                    . csrf_field() . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">
                        Hapus
                    </button>
                </form>';
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
        // Simpan data hanya dengan field yang divalidasi
            PeriodeModel::create([
                'nama_periode' => $request->input('nama_periode'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data periode berhasil disimpan',
            ]);

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

            $periode = PeriodeModel::find($id);
            if (!$periode) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data periode tidak ditemukan',
                ]);
            }

            // Update periode
            $periode->update([
                'nama_periode' => $request->input('nama_periode'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data periode berhasil diperbarui',
            ]);

        return redirect('admin/kelola-periode');
    }


    public function kelolaPeriodeConfirm(string $id){
        $periode = PeriodeModel::find($id);

        return view('admin.kelolaPeriode.confirmPeriode', ['periode' => $periode]);
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

    public function kelolaProdiTambah()
    {
        return view('admin.kelolaProdi.tambahProdi');
    }

    public function kelolaProdiEdit()
    {
        return view('admin.kelolaProdi.editProdi');
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
