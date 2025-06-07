<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BiayaPendaftaranModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_biaya_pendaftaran' => 1, 'id_criteria' => 4, 'kode_biaya_pendaftaran' => 'BPD002', 'nama_biaya_pendaftaran' => 'Fleksibel', 'skor' => 3],
            ['id_biaya_pendaftaran' => 2, 'id_criteria' => 4, 'kode_biaya_pendaftaran' => 'BPD001', 'nama_biaya_pendaftaran' => 'Berbayar', 'skor' => 2],
            ['id_biaya_pendaftaran' => 3, 'id_criteria' => 4, 'kode_biaya_pendaftaran' => 'BPD003', 'nama_biaya_pendaftaran' => 'Gratis', 'skor' => 1],
        ];
        DB::table('c_biaya_pendaftaran')->insert($data);
    }
}
