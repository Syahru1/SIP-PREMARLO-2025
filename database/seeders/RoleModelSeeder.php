<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_role' => 1, 'kode_role' => 'ADM', 'nama_role' => 'Admin'],
            ['id_role' => 2, 'kode_role' => 'MHS', 'nama_role' => 'Mahasiswa'],
            ['id_role' => 3, 'kode_role' => 'DSN', 'nama_role' => 'Dosen'],
        ];
        DB::table('role')->insert($data);
    }
}
