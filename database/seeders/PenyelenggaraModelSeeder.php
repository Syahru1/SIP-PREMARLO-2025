<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyelenggaraModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_penyelenggara' => 1, 'id_criteria' => 2, 'kode_penyelenggara' => 'P001', 'nama_penyelenggara' => 'Non-Lembaga', 'skor' => 1],
            ['id_penyelenggara' => 2, 'id_criteria' => 2, 'kode_penyelenggara' => 'P002', 'nama_penyelenggara' => 'Lembaga', 'skor' => 2],
            ['id_penyelenggara' => 3, 'id_criteria' => 2, 'kode_penyelenggara' => 'P003', 'nama_penyelenggara' => 'Kementrian', 'skor' => 3],
        ];
        DB::table('c_penyelenggara')->insert($data);
    }
}
