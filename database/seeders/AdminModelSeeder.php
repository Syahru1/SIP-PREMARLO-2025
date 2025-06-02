<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_admin' => 1, 'username' => 'ADM001', 'password' => '12345', 'nama_admin' => 'Admin Utama', 'foto_admin' => 'pp_admin.png', 'id_role' => '1'],
            ['id_admin' => 2, 'username' => 'ADM002', 'password' => '12345', 'nama_admin' => 'Admin Pendukung', 'foto_admin' => 'pp_admin.png', 'id_role' => '1'],
            ['id_admin' => 3, 'username' => 'ADM003', 'password' => '12345', 'nama_admin' => 'Admin Cadangan', 'foto_admin' => 'pp_admin.png', 'id_role' => '1'],
        ];
        DB::table('admin')->insert($data);
    }
}
