<?php

namespace App\Http\Controllers;

use App\Models\LombaModel;
use App\Models\BidangLombaModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailLomba = LombaModel::all();
        return view('admin.verifikasiLomba.index', [
            'detailLomba' => $detailLomba,
        ]);;
    }

    public function verifikasiLombaList(){
        $lomba = LombaModel::select(
            'id_lomba',
            'kode_lomba',
            'nama_lomba',
            'status_lomba',
            'status_verifikasi'
        )
        ->orderByRaw("FIELD(status_verifikasi, 'Belum Diverifikasi', 'Ditolak', 'Diverifikasi')")
        ->orderBy('id_lomba', 'asc');
            
        return DataTables::of($lomba)
            ->addIndexColumn()
            ->addColumn('badge', function ($lomba) {
            return '<span class="badge badge-primary">' . htmlspecialchars($lomba->status) . '</span>';
            })
            ->addColumn('aksi', function ($lomba) {
            $btn = '<a href="' . url('/admin/verifikasi-lomba/detail/' . $lomba->id_lomba) . '" class="btn btn-outline-primary btn-sm">Lihat Detail Prestasi</a>';
            return $btn;
            })
            ->rawColumns(['aksi', 'badge'])
            ->make(true);
    }

    public function verifikasiLombaDetail($id)
    {
        $detailLomba = LombaModel::where('id_lomba', $id)->first();
        $detailBidang = BidangLombaModel::where('id_lomba', $id)->get();
        return view('admin.verifikasiLomba.detailLomba', [
            'detailLomba' => $detailLomba,
            'detailBidang' => $detailBidang
        ]);
    }

    public function verifikasiLomba(Request $request, $id)
    {
        try {
            $lomba = LombaModel::findOrFail($id);

            $lomba->status_verifikasi = $request->status_verifikasi;
            $lomba->catatan = $request->catatan;
            $lomba->save();

            return redirect('/admin/verifikasi-lomba')->with('success', "Berhasil mengubah status menjadi {$request->status}");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal melakukan verifikasi.');
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LombaModel $lombaModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LombaModel $lombaModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LombaModel $lombaModel)
    {
        //
    }
}
