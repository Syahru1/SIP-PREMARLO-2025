<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleModelSeeder::class,
            PeriodeModelSeeder::class,
            ProdiModelSeeder::class,
            DosenModelSeeder::class,      
            BiayaPendaftaranModelSeeder::class,
            BidangModelSeeder::class,
            TingkatKompetisiModelSeeder::class,
            HadiahModelSeeder::class,
            PenyelenggaraModelSeeder::class,
            LombaModelSeeder::class,
            AdminModelSeeder::class,
            PreferensiLombaModelSeeder::class,
            MahasiswaModelSeeder::class,      
            PrestasiModelSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
