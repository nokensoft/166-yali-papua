<?php

namespace Database\Seeders;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        // Media sudah di-seed oleh MediaSeeder, cukup lookup by file_name
        $mediaMap = Media::pluck('id', 'file_name');

        if ($mediaMap->isEmpty()) {
            $this->command->warn('Belum ada media. Jalankan MediaSeeder terlebih dahulu.');
            return;
        }

        $userId = 2;

        $albums = [
            [
                'judul'     => 'Alam & Budaya Papua',
                'deskripsi' => 'Keindahan alam dan kekayaan budaya Papua yang menjadi bagian dari wilayah kerja YALI Papua.',
                'images'    => [
                    'danau-sentani.png',
                    'perahu-danau-sentani.png',
                    'raja-ampat.png',
                    'rumput-mei-wamena.png',
                ],
            ],
            [
                'judul'     => 'Seni & Arsitektur Tradisional Papua',
                'deskripsi' => 'Dokumentasi seni ukir, arsitektur tradisional, dan warisan budaya masyarakat adat Papua.',
                'images'    => [
                    'honai.png',
                    'rumah-adat.png',
                    'pahatan-kayu-sentani.png',
                ],
            ],
            [
                'judul'     => 'Kehidupan Masyarakat Adat Papua',
                'deskripsi' => 'Kehidupan sehari-hari masyarakat kampung Papua yang menjadi sasaran program YALI Papua.',
                'images'    => [
                    'anak-anak-mendayung.png',
                ],
            ],
        ];

        foreach ($albums as $albumData) {
            $galeri = Galeri::create([
                'judul'     => $albumData['judul'],
                'deskripsi' => $albumData['deskripsi'],
                'user_id'   => $userId,
            ]);

            $attachedCount = 0;

            foreach ($albumData['images'] as $fileName) {
                $mediaId = $mediaMap[$fileName] ?? null;

                if (!$mediaId) {
                    $this->command->warn("Media tidak ditemukan untuk: {$fileName}");
                    continue;
                }

                $galeri->media()->attach($mediaId);
                $attachedCount++;
            }

            $this->command->info("Album \"{$galeri->judul}\" berhasil dibuat dengan {$attachedCount} foto.");
        }
    }
}
