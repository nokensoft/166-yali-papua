<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = ['Berita & Informasi', 'Masyarakat Adat', 'Kajian & Advokasi', 'Ekonomi Adat', 'Perempuan Adat', 'Lingkungan & Alam'];

        foreach ($kategori as $nama) {
            KategoriBerita::create(['nama' => $nama]);
        }
    }
}
