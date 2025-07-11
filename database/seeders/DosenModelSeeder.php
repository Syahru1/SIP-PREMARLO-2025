<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'DSN001',
                'nama_dosen' => 'Budi Santoso, S.Kom., M.Kom.',
                'nidn' => '50907856',
                'email' => 'G5Lb0@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'profil_dosencowok1.jpg',
            ],
            [
                'username' => 'DSN002',
                'nama_dosen' => 'Yuni Astuti, S.T., M.T.',
                'nidn' => '50907857',
                'email' => 'G5Lb1@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'profil_dosencowok2.jpg',
            ],
            [
                'username' => 'DSN003',
                'nama_dosen' => 'Citra Lestari, S.T., M.T.',
                'nidn' => '50907858',
                'email' => 'G5Lb2@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'profil_dosenccewek1.jpg',
            ],
            [
                'username' => 'DSN004',
                'nama_dosen' => 'Erfan Prasetyo, S.Sos., M.Si.',
                'nidn' => '50907859',
                'email' => 'G5Lb3@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'profil_dosencowok3.jpg',
            ],
            [
                'username' => 'DSN005',
                'nama_dosen' => 'Dewi Anggraini, S.Kom, M.Kom',
                'nidn' => '50907860',
                'email' => 'G5Lb4@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'profil_dosencewek2.jpg',
            ],
            [
                'username' => 'DSN006',
                'nama_dosen' => 'Rudi Hartono, S.Kom., MT.',
                'nidn' => '50907861',
                'email' => 'G5Lb5@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'profil_dosencowok4.jpg',
            ],
        ];
        DB::table('dosen')->insert($data);
    }
}
