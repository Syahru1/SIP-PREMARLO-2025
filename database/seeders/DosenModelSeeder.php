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
                'nama_dosen' => 'Joko',
                'email' => 'G5Lb0@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
            [
                'username' => 'DSN002',
                'nama_dosen' => 'Reni',
                'email' => 'G5Lb1@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
            [
                'username' => 'DSN003',
                'nama_dosen' => 'Vacha',
                'email' => 'G5Lb2@example.com',
                'password' => bcrypt('12345'),
                'id_role' => '3',
                'foto' => 'pp_dosen.png',
            ],
        ];
        DB::table('dosen')->insert($data);
    }
}
