<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PreferensiBidangModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_mahasiswa' => 1, 'id_preferensi_mahasiswa' => 1, 'id_bidang' => 1],
            ['id_mahasiswa' => 1, 'id_preferensi_mahasiswa' => 1, 'id_bidang' => 2],
            ['id_mahasiswa' => 1, 'id_preferensi_mahasiswa' => 1, 'id_bidang' => 3],
            ['id_mahasiswa' => 1, 'id_preferensi_mahasiswa' => 1, 'id_bidang' => 7],
            ['id_mahasiswa' => 1, 'id_preferensi_mahasiswa' => 1, 'id_bidang' => 5],
            ['id_mahasiswa' => 2, 'id_preferensi_mahasiswa' => 2, 'id_bidang' => 4],
            ['id_mahasiswa' => 2, 'id_preferensi_mahasiswa' => 2, 'id_bidang' => 3],
            ['id_mahasiswa' => 2, 'id_preferensi_mahasiswa' => 2, 'id_bidang' => 6],
            ['id_mahasiswa' => 2, 'id_preferensi_mahasiswa' => 2, 'id_bidang' => 1],
            ['id_mahasiswa' => 2, 'id_preferensi_mahasiswa' => 2, 'id_bidang' => 8],
            ['id_mahasiswa' => 3, 'id_preferensi_mahasiswa' => 3, 'id_bidang' => 2],
            ['id_mahasiswa' => 3, 'id_preferensi_mahasiswa' => 3, 'id_bidang' => 3],
            ['id_mahasiswa' => 3, 'id_preferensi_mahasiswa' => 3, 'id_bidang' => 6],
            ['id_mahasiswa' => 3, 'id_preferensi_mahasiswa' => 3, 'id_bidang' => 4],
            ['id_mahasiswa' => 3, 'id_preferensi_mahasiswa' => 3, 'id_bidang' => 7],
        ];

        DB::table('preferensi_bidang')->insert($data);
    }
}
