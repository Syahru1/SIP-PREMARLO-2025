<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_periode' => 1, 'nama_periode' => '2023/2024 ganjil'],
            ['id_periode' => 2, 'nama_periode' => '2023/2024 genap'],
            ['id_periode' => 3, 'nama_periode' => '2024/2025 ganjil'],
            ['id_periode' => 4, 'nama_periode' => '2024/2025 genap'],
        ];
        DB::table('periode')->insert($data);
    }
}
