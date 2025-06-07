<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode_kriteria' => 'CRT001',
                'nama_kriteria' => 'Bidang',
                'jenis_kriteria' => 'Benefit',
                'bobot_kriteria' => 30,
            ],
            [
                'kode_kriteria' => 'CRT002',
                'nama_kriteria' => 'Penyelenggara',
                'jenis_kriteria' => 'Benefit',
                'bobot_kriteria' => 15,
            ],
            [
                'kode_kriteria' => 'CRT003',
                'nama_kriteria' => 'hadiah',
                'jenis_kriteria' => 'Benefit',
                'bobot_kriteria' => 20,
            ],
            [
                'kode_kriteria' => 'CRT004',
                'nama_kriteria' => 'Biaya Pendaftaran',
                'jenis_kriteria' => 'Cost',
                'bobot_kriteria' => 15,
            ],
            [
                'kode_kriteria' => 'CRT005',
                'nama_kriteria' => 'Tingkat Kompetisi',
                'jenis_kriteria' => 'Benefit',
                'bobot_kriteria' => 20,
            ]
        ];
        DB::table('criteria')->insert($data);
    }
}
