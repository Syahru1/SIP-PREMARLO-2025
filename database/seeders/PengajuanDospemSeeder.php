<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengajuanDospemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_mahasiswa'     => 1,
                'id_dosen'         => 1, // dosen yang dituju
                'id_tim'           => 1,
                'nama_lomba'       => 'Lomba Inovasi Teknologi',
                'deskripsi_lomba'  => 'Lomba pengembangan aplikasi inovatif berbasis AI.',
                'proposal'    => 'proposal_inovasi_teknologi.pdf',
                'tanggal_pengajuan'=> '2025-06-10',
                'status'           => 'Belum Diverifikasi',
                'catatan'         => null,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'id_mahasiswa'     => 2,
                'id_dosen'         => 1,
                'id_tim'           => 2,
                'nama_lomba'       => 'Olimpiade Data Nasional',
                'deskripsi_lomba'  => 'Kompetisi analisis dan visualisasi data tingkat nasional.',
                'proposal'    => 'proposal_olidata_nasional.pdf',
                'tanggal_pengajuan'=> '2025-06-10',
                'status'           => 'Disetujui',
                'catatan'         => null,
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
            [
                'id_mahasiswa'     => 3,
                'id_dosen'         => 1,
                'id_tim'           => 3,
                'nama_lomba'       => 'Hackathon Merdeka',
                'deskripsi_lomba'  => 'Hackathon 24 jam membangun solusi digital untuk masyarakat.',
                'proposal'    => 'proposal_hackathon_merdeka.pdf',
                'tanggal_pengajuan'=> '2025-06-10',
                'status'           => 'Ditolak',
                'catatan'         => 'Proposal tidak lengkap, perlu revisi.',
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now(),
            ],
        ];
        DB::table('pengajuan_dospem')->insert($data);
    }
}
