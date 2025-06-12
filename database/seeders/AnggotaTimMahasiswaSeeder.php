<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnggotaTimMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
             // Tim 1
            [
                'id_anggota_tim' => 1,
                'id_tim' => 1,
                'id_mahasiswa' => 1, // ketua
                'peran' => 'ketua',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_anggota_tim' => 2,
                'id_tim' => 1,
                'id_mahasiswa' => 2,
                'peran' => 'anggota',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_anggota_tim' => 3,
                'id_tim' => 1,
                'id_mahasiswa' => 3,
                'peran' => 'anggota',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Tim 2
            [
                'id_anggota_tim' => 4,
                'id_tim' => 2,
                'id_mahasiswa' => 2, // ketua
                'peran' => 'ketua',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_anggota_tim' => 5,
                'id_tim' => 2,
                'id_mahasiswa' => 3,
                'peran' => 'anggota',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Tim 3
            [
                'id_anggota_tim' => 6,
                'id_tim' => 3,
                'id_mahasiswa' => 3, // ketua
                'peran' => 'ketua',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_anggota_tim' => 7,
                'id_tim' => 3,
                'id_mahasiswa' => 1,
                'peran' => 'anggota',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('anggota_tim')->insert($data);
    }
}
