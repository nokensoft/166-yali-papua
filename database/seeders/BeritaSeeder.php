<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriMap = KategoriBerita::pluck('id', 'nama')->toArray();
        $userId = 2;

        // Data dari database/blog/data.json
        $jsonPath = base_path('database/blog/data.json');

        if (file_exists($jsonPath)) {
            $data = json_decode(file_get_contents($jsonPath), true);
            if (!empty($data)) {
                foreach ($data as $item) {
                    // Pisahkan rangkuman menjadi paragraf HTML
                    $paragraphs = preg_split('/\n{2,}/', trim($item['rangkuman']));
                    $konten = collect($paragraphs)
                        ->map(fn($p) => '<p>' . e(trim($p)) . '</p>')
                        ->implode("\n");

                    // Tentukan kategori dari field JSON, fallback ke Berita & Informasi
                    $katNama = $item['kategori'] ?? 'Berita & Informasi';
                    $katId = $kategoriMap[$katNama] ?? $kategoriMap['Berita & Informasi'] ?? null;

                    Berita::create([
                        'judul'              => $item['judul'],
                        'slug'               => Str::slug($item['judul']),
                        'ringkasan'          => Str::limit(strip_tags($item['rangkuman']), 200),
                        'konten'             => $konten,
                        'sumber_nama'        => $item['sumber'] ?? null,
                        'sumber_link'        => $item['url'] ?? null,
                        'kategori_berita_id' => $katId,
                        'gambar_url'         => null,
                        'user_id'            => $userId,
                        'status'             => 'terbit',
                        'tanggal_terbit'     => now()->subDays(count($data) - ($item['no'] ?? 0)),
                        'created_at'         => now()->subDays(count($data) - ($item['no'] ?? 0)),
                    ]);
                }
                $this->command->info('Berhasil import ' . count($data) . ' berita dari database/blog/data.json');
                return;
            }
        }

        $this->command->warn('File database/blog/data.json tidak ditemukan.');
    }
}
