<?php

namespace Database\Seeders;

use App\Models\KategoriBlog;
use Illuminate\Database\Seeder;

class KategoriBlogSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = ['Blog & Informasi', 'Masyarakat Adat', 'Kajian & Advokasi', 'Ekonomi Adat', 'Perempuan Adat', 'Lingkungan & Alam'];

        foreach ($kategori as $nama) {
            KategoriBlog::create(['nama' => $nama]);
        }
    }
}
