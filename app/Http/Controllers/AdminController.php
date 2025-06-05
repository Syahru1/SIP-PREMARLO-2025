<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\AdminModel;
use App\Models\DosenModel;
use App\Models\PeriodeModel;
use App\Models\ProdiModel;
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
        return view('admin.kelolaAdmin.index');
    }

    public function kelolaAdminList()
    {
        $admin = AdminModel::select('id_admin', 'username', 'nama_admin', 'password', 'foto_admin', 'id_role')
            ->where('id_role', 1);

        return DataTables::of($admin)
            ->addIndexColumn()
            ->addColumn('aksi', function ($admin) {
                $btn = '<button onclick="modalAction(\'' . url('admin/kelola-admin/edit/' . $admin->id_admin) . '\')" class="btn btn-warning btn-sm" data-toggle="modal">Edit</button>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('admin/kelola-admin/' . $admin->id_admin) . '">'
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



    public function kelolaAdminTambah()
    {
        $admin = AdminModel::select( 'username', 'nama_admin', 'password', 'foto_admin', 'id_role')
            ->where('id_role', 1)->get();

        return view('admin.kelolaAdmin.tambahAdmin')->with('admin', $admin);
    }

    public function kelolaAdminStore(Request $request)
    {
        // Simpan data hanya dengan field yang divalidasi
            AdminModel::create([
                'username' => $request->input('username'),
                'nama_admin' => $request->input('nama_admin'),
                'password' => bcrypt($request->input('password')), // Enkripsi password
                'foto_admin' => $request->input('foto_admin'), // Pastikan ini adalah path atau URL foto yang valid
                'id_role' => 1, // Pastikan id_role sesuai dengan admin
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data admin berhasil disimpan',
            ]);

        return redirect('admin/kelola-admin');
    }

    public function kelolaAdminEdit(string $id)
    {
        $admin = AdminModel::find($id);

        if (!$admin) {
            return response()->json([
                'status' => false,
                'message' => 'Data admin tidak ditemukan',
            ]);
        }

        return view('admin.kelolaAdmin.editAdmin', ['admin' => $admin]);
    }

    public function kelolaAdminUpdate(Request $request, string $id)
    {

            $admin = AdminModel::find($id);
            if (!$admin) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data admin tidak ditemukan',
                ]);
            }

            // Update admin
            $admin->update([
                'nama_admin' => $request->input('nama_admin'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data admin berhasil diperbarui',
            ]);

        return redirect('admin/kelola-admin');
    }


    public function kelolaAdminConfirm(string $id){
        $admin = AdminModel::find($id);

        return view('admin.kelolaAdmin.confirmadmin', ['admin' => $admin]);
    }

    public function kelolaAdminDelete(string $id)
    {
        if (request()->ajax() || request()->wantsJson()) {
            $admin = AdminModel::find($id);
            if ($admin) {
                $admin->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data admin berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data admin tidak ditemukan'
                ]);
            }
        }

        return redirect('admin/kelola-admin');
    }

    public function kelolaAdminDestroy(string $id)
    {
        $admin = AdminModel::find($id);
        if ($admin) {
            $admin->delete();
            return redirect('admin/kelola-admin')->with('success', 'Data admin berhasil dihapus');
        } else {
            return redirect('admin/kelola-admin')->with('error', 'Data admin tidak ditemukan');
        }
    }

    // Kelola Pengguna Dosen
    public function kelolaDosenIndex()
    {
        return view('admin.kelolaDosen.index');
    }

    public function kelolaDosenList()
    {
        $dosen = DosenModel::select('id_dosen', 'username', 'nama_dosen', 'email', 'password', 'foto', 'id_role')
            ->where('id_role', 3); // Hanya mengambil dosen dengan id_role 3

        return DataTables::of($dosen)
            ->addIndexColumn()
            ->addColumn('aksi', function ($dosen) {
                $btn = '<button onclick="modalAction(\'' . url('dosen/kelola-dosen/edit/' . $dosen->id_dosen) . '\')" class="btn btn-warning btn-sm" data-toggle="modal">Edit</button>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('dosen/kelola-dosen/' . $dosen->id_dosen) . '">'
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
        // if (request()->ajax() || request()->wantsJson()) {
            $data = $request->all();
            PeriodeModel::create($data);

        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Data periode berhasil disimpan',
        //     ]);
        // }
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

    public function kelolaProdiList(Request $request)
    {
        $prodi = ProdiModel::select('id_prodi', 'kode_prodi', 'nama_prodi');

        return DataTables::of($prodi)
            ->addIndexColumn()
            ->addColumn('aksi', function ($prodi) {
                $btn = '<button onclick="modalAction(\'' . url('admin/kelola-prodi/edit/' . $prodi->id_prodi) . '\')" class="btn btn-warning btn-sm" data-toggle="modal">Edit</button>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('admin/kelola-prodi/' . $prodi->id_prodi) . '">'
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



    public function kelolaProdiTambah()
    {
        $prodi = ProdiModel::select('id_prodi', 'kode_prodi', 'nama_prodi')->get();
        return view('admin.kelolaProdi.tambahProdi')->with('prodi', $prodi);
    }

    public function kelolaProdiStore(Request $request)
    {
        // Simpan data hanya dengan field yang divalidasi
            ProdiModel::create([
                'kode_prodi' => $request->input('kode_prodi'),
                'nama_prodi' => $request->input('nama_prodi'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data prodi berhasil disimpan',
            ]);

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

            $prodi = ProdiModel::find($id);
            if (!$prodi) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data prodi tidak ditemukan',
                ]);
            }

            // Update prodi
            $prodi->update([
                'kode_prodi' => $request->input('kode_prodi'),
                'nama_prodi' => $request->input('nama_prodi'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Data prodi berhasil diperbarui',
            ]);

        return redirect('admin/kelola-prodi');
    }


    public function kelolaProdiConfirm(string $id){
        $prodi = ProdiModel::find($id);

        return view('admin.kelolaProdi.confirmProdi', ['prodi' => $prodi]);
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
