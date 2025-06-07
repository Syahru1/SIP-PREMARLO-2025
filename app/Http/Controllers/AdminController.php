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
                $btn .= '<button class="btn btn-danger btn-sm" onclick="modalAction(\'' . url('admin/kelola-admin/confirm-delete/' . $admin->id_admin) . '\')"><i class="fa fa-trash"></i> Hapus</button>';
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
        $request->validate([
            'username' => 'required|string|unique:admin,username',
            'nama_admin'     => 'required|string',
            'password' => 'required|string|min:6',
            'foto_admin'     => 'nullable|image|max:2048',
        ]);

        try {
            $admin = new \App\Models\adminModel();
            $admin->username = $request->username;
            $admin->nama_admin = $request->nama_admin;
            $admin->password = bcrypt($request->password);

            if ($request->hasFile('foto')) {
                $admin->foto_admin = $request->file('foto')->store('admin', 'public');
            } else {
                $admin->foto_admin = 'pp_admin.png'; // default
            }

            $admin->id_role = 1; // Tetapkan role sebagai admin
            $admin->save();

            return response()->json(['status' => true, 'message' => 'Data admin berhasil disimpan.']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        };
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
        $request->validate([
            'username'    => 'required|string|unique:admin,username,' . $id . ',id_admin',
            'nama_admin'  => 'required|string',
            'password'    => 'nullable|string|min:6',
            'foto'        => 'nullable|image|max:2048',
        ]);

        $admin = AdminModel::where('id_role', 1)->find($id);

        if (!$admin) {
            return response()->json([
                'status' => false,
                'message' => 'Data admin tidak ditemukan',
            ]);
        }

        $admin->username = $request->username;
        $admin->nama_admin = $request->nama_admin;

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        if ($request->hasFile('foto_admin')) {
            $admin->foto = $request->file('foto_admin')->store('admin', 'public');
        }

        $admin->save();

        return response()->json([
            'status' => true,
            'message' => 'Data admin berhasil diperbarui',
        ]);
    }


    public function kelolaAdminConfirmDelete(string $id){
        $admin = AdminModel::find($id);

        return view('admin.kelolaAdmin.confirmDelete', ['admin' => $admin]);
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
                $btn = '<button onclick="modalAction(\'' . url('admin/kelola-dosen/edit/' . $dosen->id_dosen) . '\')" class="btn btn-warning btn-sm" data-toggle="modal">Edit</button>';
                $btn .= '<button class="btn btn-danger btn-sm" onclick="modalAction(\'' . url('admin/kelola-dosen/confirm-delete/' . $dosen->id_dosen) . '\')"><i class="fa fa-trash"></i> Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function kelolaDosenTambah()
    {
    return view('admin.kelolaDosen.tambahDosen');
    }

    public function kelolaDosenStore(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:dosen,username',
            'nama_dosen'     => 'required|string',
            'email'    => 'required|email|unique:dosen,email',
            'password' => 'required|string|min:6',
            'foto'     => 'nullable|image|max:2048',
        ]);

        try {
            $dosen = new \App\Models\DosenModel();
            $dosen->username = $request->username;
            $dosen->nama_dosen = $request->nama_dosen;
            $dosen->email = $request->email;
            $dosen->password = bcrypt($request->password);

            if ($request->hasFile('foto')) {
                $dosen->foto = $request->file('foto')->store('dosen', 'public');
            } else {
                $dosen->foto = 'pp_dosen.png'; // default
            }

            $dosen->id_role = 3; // Tetapkan role sebagai dosen
            $dosen->save();

            return response()->json(['status' => true, 'message' => 'Data dosen berhasil disimpan.']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function kelolaDosenEdit(string $id)
    {
        $dosen = DosenModel::where('id_role', 3)->find($id);

        if (!$dosen) {
            return response()->view('admin.kelolaDosen.editDosen', ['dosen' => null]);
        }

        return view('admin.kelolaDosen.editDosen', ['dosen' => $dosen]);
    }


    public function kelolaDosenUpdate(Request $request, string $id)
        {
        $request->validate([
            'username'    => 'required|string|unique:dosen,username,' . $id . ',id_dosen',
            'nama_dosen'  => 'required|string',
            'email'       => 'required|email|unique:dosen,email,' . $id . ',id_dosen',
            'password'    => 'nullable|string|min:6',
            'foto'        => 'nullable|image|max:2048',
        ]);

        $dosen = DosenModel::where('id_role', 3)->find($id);

        if (!$dosen) {
            return response()->json([
                'status' => false,
                'message' => 'Data dosen tidak ditemukan',
            ]);
        }

        $dosen->username = $request->username;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->email = $request->email;

        if ($request->filled('password')) {
            $dosen->password = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            $dosen->foto = $request->file('foto')->store('dosen', 'public');
        }

        $dosen->save();

        return response()->json([
            'status' => true,
            'message' => 'Data dosen berhasil diperbarui',
        ]);
    }

    public function kelolaDosenConfirmDelete($id)
    {
        $dosen = DosenModel::find($id);

        if (!$dosen) {
            return response()->json([
                'status' => false,
                'message' => 'Data dosen tidak ditemukan',
            ]);
        }

        return view('admin.kelolaDosen.confirmDosen', compact('dosen'));
    }

    // Menghapus data via AJAX
    public function kelolaDosenDelete(string $id)
    {
        if (request()->ajax() || request()->wantsJson()) {
            $dosen = DosenModel::find($id);
            if ($dosen) {
                $dosen->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data dosen berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data dosen tidak ditemukan'
                ]);
            }
        }

        return redirect('admin/kelola-dosen');
    }

    // Menghapus data via form biasa (non-AJAX)
    public function kelolaDosenDestroy(string $id)
    {
        $dosen = DosenModel::find($id);
        if ($dosen) {
            $dosen->delete();
            return redirect('admin/kelola-dosen')->with('success', 'Data dosen berhasil dihapus');
        } else {
            return redirect('admin/kelola-dosen')->with('error', 'Data dosen tidak ditemukan');
        }
    }

    // Kelola Pengguna Mahasiswa
    public function kelolaMahasiswaIndex()
    {
        return view('admin.kelolaMahasiswa.index');
    }

    public function kelolaMahasiswaList(Request $request)
    {
        $mahasiswa = MahasiswaModel::select('id_mahasiswa', 'username', 'nama', 'foto', 'id_prodi', 'id_periode', 'id_role')
            ->where('id_role', 2)
            ->with(['periode', 'prodi']);

        // Filter berdasarkan id_prodi jika ada
        if ($request->filled('id_prodi')) {
            $mahasiswa->where('id_prodi', $request->id_prodi);
        }

        return DataTables::of($mahasiswa)
            ->addIndexColumn()

            // Menambahkan kolom nama prodi
            ->addColumn('prodi', function ($mahasiswa) {
                return $mahasiswa->prodi->nama_prodi ?? '-';
            })

            // Supaya pencarian DataTables di kolom prodi
            ->filterColumn('prodi', function($query, $keyword) {
                $query->whereHas('prodi', function($q) use ($keyword) {
                    $q->whereRaw('LOWER(nama_prodi) LIKE ?', ["%".strtolower($keyword)."%"]);
                });
            })

            // Kolom Aksi (Edit + Hapus)
            ->addColumn('aksi', function ($mahasiswa) {
                $btn = '<button onclick="modalAction(\'' . url('admin/kelola-mahasiswa/edit/' . $mahasiswa->id_mahasiswa) . '\')" class="btn btn-warning btn-sm" data-toggle="modal">Edit</button>';
                $btn .= '<button class="btn btn-danger btn-sm" onclick="modalAction(\'' . url('admin/kelola-mahasiswa/confirm-delete/' . $mahasiswa->id_mahasiswa) . '\')"><i class="fa fa-trash"></i> Hapus</button>';
                return $btn;
            })

            ->rawColumns(['aksi']) // biar button HTML bisa tampil
            ->make(true);
    }


    public function kelolaMahasiswaTambah()
    {

        $prodi = ProdiModel::all(); // ambil semua program studi
        $periode = PeriodeModel::all(); // ambil semua periode
        return view('admin.kelolaMahasiswa.tambahMahasiswa', [
            'prodi' => $prodi,
            'periode' => $periode
        ]);
    }

    public function kelolaMahasiswaStore(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:mahasiswa,username',
            'nama'     => 'required|string',
            'id_periode' => 'required|exists:periode,id_periode',
            'id_prodi'    => 'required|exists:prodi,id_prodi',
            'password' => 'required|string|min:6',
            'foto'     => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $mahasiswa = new MahasiswaModel();
            $mahasiswa->username = $request->username;
            $mahasiswa->nama = $request->nama;
            $mahasiswa->id_periode = $request->id_periode;
            $mahasiswa->id_prodi = $request->id_prodi;
            $mahasiswa->password = bcrypt($request->password);

            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('foto', 'public');
                $mahasiswa->foto = 'storage/' . $path;
            } else {
                $mahasiswa->foto = 'pp_mahasiswa.png'; // Pastikan file ini ada di public/storage
            }

            $mahasiswa->id_role = 2;
            $mahasiswa->save();

            return response()->json([
                'status' => true,
                'message' => 'Data mahasiswa berhasil disimpan.'
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Langsung tampilkan error, hapus ini kalau sudah selesai debug
            Log::error('Gagal simpan mahasiswa: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }


    public function kelolaMahasiswaEdit(string $id)
    {
        $mahasiswa = MahasiswaModel::where('id_role', 2)->where('id_mahasiswa', $id)->first();

        $prodi = ProdiModel::all();
        $periode = PeriodeModel::all();
        return view('admin.kelolaMahasiswa.editMahasiswa', [
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'periode' => $periode
        ]);
    }


    public function kelolaMahasiswaUpdate(Request $request, string $id)
    {
        $request->validate([
            'username'    => 'required|string|unique:mahasiswa,username,' . $id . ',id_mahasiswa',
            'nama'  => 'required|string',
            'id_prodi'    => 'required|exists:prodi,id_prodi',
            'id_periode' => 'required|exists:periode,id_periode', // Pastikan ini ada di form
            'password'    => 'nullable|string|min:6',
            'foto'        => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $mahasiswa = MahasiswaModel::where('id_role', 2)->where('id_mahasiswa', $id)->first();

        if (!$mahasiswa) {
            return response()->json([
                'status' => false,
                'message' => 'Data Mahasiswa tidak ditemukan',
            ]);
        }

        $mahasiswa->username = $request->username;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->id_prodi = $request->id_prodi;
        $mahasiswa->id_periode = $request->id_periode; // Pastikan ini ada di form

        if ($request->filled('password')) {
            $mahasiswa->password = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            $mahasiswa->foto = $request->file('foto')->store('foto', 'public');
        }

        $mahasiswa->save();

        return response()->json([
            'status' => true,
            'message' => 'Data mahasiswa berhasil diperbarui',
        ]);
    }

    public function kelolaMahasiswaConfirmDelete($id)
    {
        $mahasiswa = MahasiswaModel::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'status' => false,
                'message' => 'Data mahasiswa tidak ditemukan',
            ]);
        }

        return view('admin.kelolaMahasiswa.confirmDelete', compact('mahasiswa'));
    }

    // Menghapus data via AJAX
    public function kelolaMahasiswaDelete(string $id)
    {
        if (request()->ajax() || request()->wantsJson()) {
            $mahasiswa = MahasiswaModel::find($id);
            if ($mahasiswa) {
                $mahasiswa->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data mahasiswa berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data mahasiswa tidak ditemukan'
                ]);
            }
        }

        return redirect('admin/kelola-mahasiswa');
    }

    public function kelolaMahasiswaDestroy(string $id)
    {
        $mahasiswa = MahasiswaModel::find($id);
        if ($mahasiswa) {
            $mahasiswa->delete();
            return redirect('admin/kelola-mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus');
        } else {
            return redirect('admin/kelola-mahasiswa')->with('error', 'Data mahasiswa tidak ditemukan');
        }
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
