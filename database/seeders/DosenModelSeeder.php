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
                'nama_dosen' => 'Dr. Eng. Cahya Rahmad, S.T., M.Kom.',
                'nidn' => '50907856',
                'email' => 'G5Lb0@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
            [
                'username' => 'DSN002',
                'nama_dosen' => 'Muhammad Afif Hendrawan.,S.Kom., MT',
                'nidn' => '50907857',
                'email' => 'G5Lb1@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
            [
                'username' => 'DSN003',
                'nama_dosen' => 'Triana Fatmawati,S.T., M.T.',
                'nidn' => '50907858',
                'email' => 'G5Lb2@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
            [
                'username' => 'DSN004',
                'nama_dosen' => 'Satrio Binusa S, SS, M.Pd.',
                'nidn' => '50907859',
                'email' => 'G5Lb3@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
            [
                'username' => 'DSN005',
                'nama_dosen' => 'Vivi Nur Wijayaningrum, S.Kom, M.Kom',
                'nidn' => '50907860',
                'email' => 'G5Lb4@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
            [
                'username' => 'DSN006',
                'nama_dosen' => 'Usman Nurhasan, S.Kom., MT.',
                'nidn' => '50907861',
                'email' => 'G5Lb5@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
        ];
        DB::table('dosen')->insert($data);
    }
}
