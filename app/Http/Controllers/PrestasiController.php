<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrestasiModel;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Barryvdh\DomPDF\Facade\Pdf;

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


            if($request->status == 'Sudah Diverifikasi'){
                $skor = 0;

                if($prestasi->juara_kompetisi == 'Juara 1' && $prestasi->tingkat_kompetisi == 'Internasional'){
                    $skor = 100;
                } elseif($prestasi->juara_kompetisi == 'Juara 2' && $prestasi->tingkat_kompetisi == 'Internasional'){
                    $skor = 80;
                } elseif($prestasi->juara_kompetisi == 'Juara 3' && $prestasi->tingkat_kompetisi == 'Internasional'){
                    $skor = 60;
                } elseif($prestasi->juara_kompetisi == 'Juara 1' && $prestasi->tingkat_kompetisi == 'Nasional'){
                    $skor = 70;
                } elseif($prestasi->juara_kompetisi == 'Juara 2' && $prestasi->tingkat_kompetisi == 'Nasional'){
                    $skor = 50;
                } elseif($prestasi->juara_kompetisi == 'Juara 3' && $prestasi->tingkat_kompetisi == 'Nasional'){
                    $skor = 30;
                } elseif($prestasi->juara_kompetisi == 'Juara 1' && $prestasi->tingkat_kompetisi == 'Regional'){
                    $skor = 40;
                } elseif($prestasi->juara_kompetisi == 'Juara 2' && $prestasi->tingkat_kompetisi == 'Regional'){
                    $skor = 30;
                } elseif($prestasi->juara_kompetisi == 'Juara 3' && $prestasi->tingkat_kompetisi == 'Regional'){
                    $skor = 10;
                }

                $prestasi->skor = $skor;
            }

            if($request->status == 'Belum Diverifikasi' || $request->status == 'Ditolak'){
                $skor = 0;
                $prestasi->skor = $skor;
            }
            $prestasi->save();

            return redirect('/admin/verifikasi-prestasi')->with('success', "Berhasil mengubah status menjadi {$request->status}");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal melakukan verifikasi.');
        }
    }

         // Laporan Analisis Prestasi
    public function laporanAnalisisPrestasiIndex()
    {
        $prestasi = PrestasiModel::with(['prodi', 'periode', 'mahasiswa', 'dosen'])
            ->where('status', 'Sudah Diverifikasi')
            ->get();

        return view('admin.laporanAnalisisPrestasi.index', compact('prestasi'));
    }

    public function laporanAnalisisPrestasiDetail($id)
    {
        $data = PrestasiModel::with([ 'dosen', 'mahasiswa', 'prodi', 'periode']) // sesuaikan relasi
            ->findOrFail($id);

        return view('admin.laporanAnalisisPrestasi.detailPrestasi', compact('data'));
    }

    public function laporanAnalisisPrestasiExportExcel()
    {
        $prestasi = PrestasiModel::with(['prodi', 'periode', 'mahasiswa', 'dosen'])
            ->where('status', 'Sudah Diverifikasi')
            ->get();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Prestasi');
        $sheet->setCellValue('C1', 'Posisi');
        $sheet->setCellValue('D1', 'Nama Mahasiswa');
        $sheet->setCellValue('E1', 'NIM');
        $sheet->setCellValue('F1', 'Program Studi');
        $sheet->setCellValue('G1', 'Nama Kompetisi');
        $sheet->setCellValue('H1', 'Tingkat Kompetisi');
        $sheet->setCellValue('I1', 'Jenis Prestasi');
        $sheet->setCellValue('J1', 'Lokasi Kompetisi');
        $sheet->setCellValue('K1', 'Tanggal Surat Tugas');
        $sheet->setCellValue('L1', 'Tanggal Kompetisi');
        $sheet->setCellValue('M1', 'Dosen Pembimbing');
        $sheet->setCellValue('N1', 'Periode');
        $sheet->setCellValue('O1', 'Jumlah Universitas Peserta');
        $sheet->setCellValue('P1', 'Link Pendaftaran');
        $sheet->setCellValue('Q1', 'Nomor Sertifikat');
        $sheet->setCellValue('R1', 'Foto Sertifikat');
        $sheet->setCellValue('S1', 'Status');


        $sheet->getStyle('A1:G1')->getFont()->setBold(true);

        $no = 1;
        $baris = 2;
        foreach ($prestasi as $item) {
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $item->mahasiswa->juara_kompetisi);
            $sheet->setCellValue('C' . $baris, $item->posisi);
            $sheet->setCellValue('D' . $baris, $item->mahasiswa->nama);
            $sheet->setCellValue('E' . $baris, $item->mahasiswa->nim);
            $sheet->setCellValue('F' . $baris, $item->prodi->nama_prodi);
            $sheet->setCellValue('G' . $baris, $item->nama_kompetisi);
            $sheet->setCellValue('H' . $baris, $item->tingkat_kompetisi);
            $sheet->setCellValue('I' . $baris, $item->jenis_prestasi);
            $sheet->setCellValue('J' . $baris, $item->lokasi_kompetisi);
            $sheet->setCellValue('K' . $baris, $item->tanggal_surat_tugas);
            $sheet->setCellValue('L' . $baris, $item->tanggal_kompetisi);
            $sheet->setCellValue('M' . $baris, $item->dosen->nama_dosen);
            $sheet->setCellValue('N' . $baris, $item->periode->nama_periode);
            $sheet->setCellValue('O' . $baris, $item->jumlah_univ);
            $sheet->setCellValue('P' . $baris, $item->link_perlombaan);
            $sheet->setCellValue('Q' . $baris, $item->nomor_sertifikat);
            $sheet->setCellValue('R' . $baris, $item->foto_sertifikat);
            $sheet->setCellValue('S' . $baris, $item->status);

            $baris++;
        }

        foreach (range('A', 'G') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $sheet->setTitle('Laporan Prestasi Mahasiswa');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Laporan Prestasi Mahasiswa ' . date('Y-m-d') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        $writer->save('php://output');
        exit;
    }

    public function laporanAnalisisPrestasiExportPDF()
    {
        $prestasi = PrestasiModel::with(['prodi', 'periode', 'mahasiswa', 'dosen'])
            ->where('status', 'Sudah Diverifikasi')
            ->get();

        return PDF::loadView('admin.laporanAnalisisPrestasi.export_pdf', compact('prestasi'))
            ->setPaper('a4', 'portrait')
            ->setOption(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->stream('Laporan Prestasi Mahasiswa ' . date('Y-m-d') . '.pdf', [
                'Attachment' => false,
            ]);
    }

}
