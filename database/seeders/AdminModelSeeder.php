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
            ['id_admin' => 1, 'username' => 'ADM001', 'password' => bcrypt('12345'), 'nama_admin' => 'Danin', 'foto_admin' => 'profil_admin1.jpg', 'id_role' => '1'],
            ['id_admin' => 2, 'username' => 'ADM002', 'password' => bcrypt('12345'), 'nama_admin' => 'Titis Octary Satrio', 'foto_admin' => 'profil_admin2.jpg', 'id_role' => '1'],
            ['id_admin' => 3, 'username' => 'ADM003', 'password' => bcrypt('12345'), 'nama_admin' => 'Ana Agustina', 'foto_admin' => 'profil_admin3.jpg', 'id_role' => '1'],
        ];
        DB::table('admin')->insert($data);
    }
}
