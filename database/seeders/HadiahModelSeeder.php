<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HadiahModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_hadiah' => 1, 'kode_hadiah' => 'H001', 'nama_hadiah' => 'Uang tunai besar + Sertifikat + Peluang karier', 
                'deskripsi_hadiah' => '> Rp10 juta + e-certificate + peluang magang/kerja', 'skor' => 10],
            ['id_hadiah' => 2, 'kode_hadiah' => 'H002', 'nama_hadiah' => 'Uang tunai sedang + Sertifikat + Media publikasi',
                'deskripsi_hadiah' => 'Rp5–10 juta + e-certificate + liputan media / sosial media resmi', 'skor' => 9],
            ['id_hadiah' => 3, 'kode_hadiah' => 'H003', 'nama_hadiah' => 'Uang tunai kecil + Sertifikat + Goodies / Merchandise', 
                'deskripsi_hadiah' => 'Rp1–5 juta + sertifikat + T-shirt, swag, voucher, dll.', 'skor' => 8],
            ['id_hadiah' => 4, 'kode_hadiah' => 'H004', 'nama_hadiah' => 'Sertifikat + Pelatihan/Peluang Inkubasi Startup',
                'deskripsi_hadiah' => 'Sertifikat + akses ke bootcamp/inkubasi startup', 'skor' => 7],
            ['id_hadiah' => 5, 'kode_hadiah' => 'H005', 'nama_hadiah' => 'Sertifikat Nasional / Internasional (tanpa uang tunai)',    
                'deskripsi_hadiah' => 'Sertifikat dari institusi kredibel, tapi tanpa hadiah uang', 'skor' => 6],
            ['id_hadiah' => 6, 'kode_hadiah' => 'H006', 'nama_hadiah' => 'E-Sertifikat Partisipasi',
                'deskripsi_hadiah' => 'Sertifikat digital biasa untuk semua peserta', 'skor' => 5],
            ['id_hadiah' => 7, 'kode_hadiah' => 'H007', 'nama_hadiah' => 'Akses Kursus Premium / Tools Software Gratis',
                'deskripsi_hadiah' => 'Lisensi software premium, akun gratis kursus (Dicoding, Coursera, dll)', 'skor' => 4],
            ['id_hadiah' => 8, 'kode_hadiah' => 'H008', 'nama_hadiah' => 'Hadiah Fisik Kecil (Goodie Bag Saja)',
                'deskripsi_hadiah' => 'Tas, pin, notebook, tanpa sertifikat atau uang', 'skor' => 3],
            ['id_hadiah' => 9, 'kode_hadiah' => 'H009', 'nama_hadiah' => 'Hadiah Tidak Jelas / Tidak Diumumkan',
                'deskripsi_hadiah' => 'Informasi tidak lengkap atau diragukan', 'skor' => 2],
            ['id_hadiah' => 10, 'kode_hadiah' => 'H010', 'nama_hadiah' => 'Tidak Ada Hadiah', 
                'deskripsi_hadiah' => 'Tidak menawarkan apa pun selain partisipasi', 'skor' => 1],
        ];
        DB::table('c_hadiah')->insert($data);
    }
}
