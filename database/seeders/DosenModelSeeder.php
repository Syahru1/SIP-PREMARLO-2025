<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DosenModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_dosen' => 1,
                'nidn' => '1234567890',
                'nama_dosen' => 'Dosen Utama',
                'email' => 'G5Lb0@example.com',
                'password' => Hash::make('password'),
            ]
        ];
    }
}
