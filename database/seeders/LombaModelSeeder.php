<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LombaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('c_lomba')->insert([
            [
                'kode_lomba' => 'LMB001',
                'nama_lomba' => 'Lomba UI/UX Nasional',
                'id_tingkat_kompetisi' => 2,
                'id_penyelenggara' => 1,
                'id_biaya_pendaftaran' => 2,
                'id_hadiah' => 3,
                'tanggal_mulai_pendaftaran' => '2025-07-01',
                'tanggal_akhir_pendaftaran' => '2025-07-15',
                'lokasi_lomba' => 'Jakarta',
                'link_pendaftaran' => 'http://daftar-lomba.com/1',
                'deskripsi_lomba' => 'Lomba desain UI/UX untuk mahasiswa seluruh Indonesia.',
                'status_lomba' => 'Masih Berlangsung',
                'gambar_lomba' => 'uiux.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_lomba' => 'LMB002',
                'nama_lomba' => 'Capture the Flag Nasional',
                'id_tingkat_kompetisi' => 1,
                'id_penyelenggara' => 2,
                'id_biaya_pendaftaran' => 1,
                'id_hadiah' => 2,
                'tanggal_mulai_pendaftaran' => '2025-08-10',
                'tanggal_akhir_pendaftaran' => '2025-08-25',
                'lokasi_lomba' => 'Bandung',
                'link_pendaftaran' => 'http://daftar-lomba.com/2',
                'deskripsi_lomba' => 'Kompetisi Capture the Flag untuk mahasiswa di seluruh Indonesia.',
                'status_lomba' => 'Masih Berlangsung',
                'gambar_lomba' => 'math.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
