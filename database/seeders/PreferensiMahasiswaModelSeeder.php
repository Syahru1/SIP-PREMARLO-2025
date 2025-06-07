<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PreferensiMahasiswaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_preferensi_mahasiswa' => 1,
                'id_mahasiswa' => 1,
                'id_penyelenggara' => 1,
                'id_biaya_pendaftaran' => 2,
                'id_tingkat_kompetisi' => 3,
                'id_hadiah' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_preferensi_mahasiswa' => 2,
                'id_mahasiswa' => 2,
                'id_penyelenggara' => 2,
                'id_biaya_pendaftaran' => 1,
                'id_tingkat_kompetisi' => 2,
                'id_hadiah' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_preferensi_mahasiswa' => 3,
                'id_mahasiswa' => 3,
                'id_penyelenggara' => 1,
                'id_biaya_pendaftaran' => 3,
                'id_tingkat_kompetisi' => 1,
                'id_hadiah' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        DB::table('preferensi_mahasiswa')->insert($data);
    }
}
