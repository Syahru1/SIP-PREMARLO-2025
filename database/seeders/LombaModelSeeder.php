<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LombaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('c_lomba')->insert([
            [
                'kode_lomba' => 'LMB001',
                'nama_lomba' => 'IT COMPFEST UI/UX Design Competition',
                'id_tingkat_kompetisi' => 1,
                'id_penyelenggara' => 2,
                'id_biaya_pendaftaran' => 2,
                'id_hadiah' => 3,
                'tanggal_mulai_pendaftaran' => '2025-03-06',
                'tanggal_akhir_pendaftaran' => '2025-07-01',
                'lokasi_lomba' => 'Universitas Muhammadiyah Ponorogo',
                'link_pendaftaran' => 'https://docs.google.com/forms/d/e/1FAIpQLSckXQgQL5CEKACsLLIPQ-tAOiQ1MwVFEU8DVzarvLKyLyLTkw/viewform',
                'deskripsi_lomba' => 'Lomba desain UI/UX untuk SMA/SMK dan Mahasiswa se-Jawa Timur.',
                'status_lomba' => 'Masih Berlangsung',
                'gambar_lomba' => 'storage/app/public/lomba/it_compfest_2025.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_lomba' => 'LMB002',
                'nama_lomba' => 'IT Fest 2025 AI in Action: Innovate, Compete, and Create',
                'id_tingkat_kompetisi' => 2,
                'id_penyelenggara' => 2,
                'id_biaya_pendaftaran' => 2,
                'id_hadiah' => 2,
                'tanggal_mulai_pendaftaran' => '2025-05-20',
                'tanggal_akhir_pendaftaran' => '2025-07-23',
                'lokasi_lomba' => 'Bandung',
                'link_pendaftaran' => 'https://docs.google.com/forms/d/e/1FAIpQLSdTiAkRXYCPlPaS3PAsPTf4l_xkai4VbjwQxvT3QVQHn31RtA/viewform',
                'deskripsi_lomba' => 'IT Festival 2025 merupakan kompetisi teknologi tingkat nasional yang diselenggarakan oleh Himpunan Mahasiswa Vokasi Micro IT IPB University yang diharapkan menjadi wadah bagi mahasiswa untuk berinovasi, berkompetisi, dan berkolaborasi dalam dunia Teknologi.🧑‍💻',
                'status_lomba' => 'Masih Berlangsung',
                'gambar_lomba' => 'storage/app/public/lomba/it_fest_2025.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_lomba' => 'LMB003',
                'nama_lomba' => 'DATATHON 2025: Data Science Competition',
                'id_tingkat_kompetisi' => 3,
                'id_penyelenggara' => 2,
                'id_biaya_pendaftaran' => 2,
                'id_hadiah' => 1,
                'tanggal_mulai_pendaftaran' => '2025-06-01',
                'tanggal_akhir_pendaftaran' => '2025-06-15',
                'lokasi_lomba' => 'Fakultas Ilmu Komputer, Universitas Indonesia',
                'link_pendaftaran' => 'https://event.ristek.cs.ui.ac.id/datathon-registration',
                'deskripsi_lomba' => 'Datathon 2025 adalah kompetisi sains data dan pengembangan solusi berbasis AI/ML yang diselenggarakan oleh Riset dan Teknologi (RISTEK) Fakultas Ilmu Komputer Universitas Indonesia.mengimplementasikan solusi praktis berupa prototipe fungsional.',
                'status_lomba' => 'Masih Berlangsung',
                'gambar_lomba' => 'storage/app/public/lomba/datathon_2025.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_lomba' => 'LMB004',
                'nama_lomba' => 'INSPACE COMPETITIONS 2025: Business Plan Competition',
                'id_tingkat_kompetisi' => 2,
                'id_penyelenggara' => 2,
                'id_biaya_pendaftaran' => 2,
                'id_hadiah' => 3,
                'tanggal_mulai_pendaftaran' => '2025-05-17',
                'tanggal_akhir_pendaftaran' => '2025-07-19',
                'lokasi_lomba' => 'Bandung',
                'link_pendaftaran' => 'https://inspace.itk.ac.id/competition/BPC-2025',
                'deskripsi_lomba' => 'Business Plan Competition INSPACE 2025 adalah kompetisi rancangan bisnis bagi mahasiswa/i (Negeri/Swasta) nasional di seluruh Indonesia. Kompetisi ini bertujuan memberikan kesempatan kepada mahasiswa agar dapat memberikan gagasan ide bisnis yang kreatif dan inovatif.',
                'status_lomba' => 'Masih Berlangsung',
                'gambar_lomba' => 'storage/app/public/lomba/inspace_2025.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
