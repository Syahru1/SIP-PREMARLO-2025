<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TingkatKompetisiModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_tingkat_kompetisi' => 1, 'id_criteria' => 5, 'kode_tingkat_kompetisi' => 'TK001', 'nama_tingkat_kompetisi' => 'Regional', 'skor' => 1],
            ['id_tingkat_kompetisi' => 2, 'id_criteria' => 5, 'kode_tingkat_kompetisi' => 'TK002', 'nama_tingkat_kompetisi' => 'Nasional', 'skor' => 2],
            ['id_tingkat_kompetisi' => 3, 'id_criteria' => 5, 'kode_tingkat_kompetisi' => 'TK003', 'nama_tingkat_kompetisi' => 'Internasional', 'skor' => 3],
        ];
        DB::table('c_tingkat_kompetisi')->insert($data);
    }
}
