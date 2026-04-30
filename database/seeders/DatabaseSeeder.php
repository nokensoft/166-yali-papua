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
            KategoriBlogSeeder::class,
            BlogSeeder::class,
            GaleriSeeder::class,
        ]);
    }
}
