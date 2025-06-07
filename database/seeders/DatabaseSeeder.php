<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LombaModel;
use App\Models\SPKBobotModel;
use App\Models\SPKNilaiOptimasiModel;
use App\Models\SPKNormalisasiModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //tables periode and prodi
            PeriodeModelSeeder::class,
            ProdiModelSeeder::class,

            //tables users
            RoleModelSeeder::class,
            AdminModelSeeder::class,
            DosenModelSeeder::class,
            MahasiswaModelSeeder::class,

            //tables criteria
            CriteriaModelSeeder::class,
            BiayaPendaftaranModelSeeder::class,
            BidangModelSeeder::class,
            TingkatKompetisiModelSeeder::class,
            HadiahModelSeeder::class,
            PenyelenggaraModelSeeder::class,

            //tables in profile mahasiswa
            PrestasiModelSeeder::class,
            PreferensiMahasiswaModelSeeder::class,
            PreferensiBidangModelSeeder::class,

            //tables SPK
            SPKMatriksModelSeeder::class,
            SPKNormalisasiSeeder::class,
            SPKBobotModelSeeder::class,
            SPKNilaiOptimasiModelSeeder::class,

            //tables lomba
            LombaModelSeeder::class,
            BidangLombaModelSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
