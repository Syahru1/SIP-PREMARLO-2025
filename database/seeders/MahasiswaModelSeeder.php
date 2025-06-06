<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_role' => 2,
                'id_prodi' => 1,
                'id_periode' => 1,
                'username' => 'MHS001',
                'nama' => 'SATRIA PANGESTU ADILAMSYAH',
                'password' => bcrypt('12345'),
                'angkatan' => '21',
                'foto' => 'pp_mahasiswa.png',
            ],
            [
                'id_role' => 2,
                'id_prodi' => 2,
                'id_periode' => 1,
                'username' => 'MHS002',
                'nama' => 'DEWI LESTARI',
                'password' => bcrypt('12345'),
                'angkatan' => '23',
                'foto' => 'pp_mahasiswa.png',
            ],
            [
                'id_role' => 2,
                'id_prodi' => 3,
                'id_periode' => 1,
                'username' => 'DAVID SEPTIAN',
                'nama' => 'Andi',
                'password' => bcrypt('12345'),
                'angkatan' => '23',
                'foto' => 'pp_mahasiswa.png',
            ],
        ];
        DB::table('mahasiswa')->insert($data);
    }
}
