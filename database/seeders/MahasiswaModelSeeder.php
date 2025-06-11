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
                'nim' => '2241720140',
                'password' => bcrypt('12345'),
                'foto' => 'profil_cowok1.jpg',
            ],
            [
                'id_role' => 2,
                'id_prodi' => 2,
                'id_periode' => 1,
                'username' => 'MHS002',
                'nama' => 'DEWI LESTARI',
                'nim' => '2241720141',
                'password' => bcrypt('12345'),
                'foto' => 'profil_cewek1.jpg',
            ],
            [
                'id_role' => 2,
                'id_prodi' => 3,
                'id_periode' => 1,
                'username' => 'MHS003',
                'nama' => 'DAVID SEPTIAN',
                'nim' => '2241720142',
                'password' => bcrypt('12345'),
                'foto' => 'profil_cowok2.jpg',
            ],
        ];
        DB::table('mahasiswa')->insert($data);
    }
}
