<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HalamanSeeder::class,
            PengaturanSitusSeeder::class,
            MediaSeeder::class,
            KategoriBeritaSeeder::class,
            BeritaSeeder::class,
            ProgramDonasiSeeder::class,
            DonasiSeeder::class,
            GaleriSeeder::class,
        ]);
    }
}
