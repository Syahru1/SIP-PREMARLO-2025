<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =  [
            ['id_bidang' => 1, 'kode_bidang' => 'BID001', 'nama_bidang' => 'Pemrograman', 'skor'=> 1],
            ['id_bidang' => 2, 'kode_bidang' => 'BID002', 'nama_bidang' => 'Cyber Security', 'skor'=> 1],
            ['id_bidang' => 3, 'kode_bidang' => 'BID003', 'nama_bidang' => 'Kecerdasan Buatan', 'skor'=> 1],
            ['id_bidang' => 4, 'kode_bidang' => 'BID004', 'nama_bidang' => 'UI/UX Design', 'skor'=> 1],
            ['id_bidang' => 5, 'kode_bidang' => 'BID005', 'nama_bidang' => 'Data Science', 'skor'=> 1],
            ['id_bidang' => 6, 'kode_bidang' => 'BID006', 'nama_bidang' => 'Pengembangan Data', 'skor'=> 1],
            ['id_bidang' => 7, 'kode_bidang' => 'BID007', 'nama_bidang' => 'Bisnis TIK', 'skor'=> 1],
            ['id_bidang' => 8, 'kode_bidang' => 'BID008', 'nama_bidang' => 'Game Development', 'skor'=> 1],
        ];
        DB::table('c_bidang')->insert($data);
    }
}
