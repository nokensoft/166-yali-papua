<?php

namespace Database\Seeders;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            $slug = Str::slug($albumData['judul']);

            $galeri = Galeri::withTrashed()->where('slug', $slug)->first();

            if (!$galeri) {
                $galeri = new Galeri();
                $galeri->slug = $slug;
            }

            $galeri->judul = $albumData['judul'];
            $galeri->deskripsi = $albumData['deskripsi'];
            $galeri->user_id = $userId;
            $galeri->save();

            if ($galeri->trashed()) {
                $galeri->restore();
            }

            $syncData = [];
            $attachedCount = 0;

            foreach ($albumData['images'] as $fileName) {
                $mediaId = $mediaMap[$fileName] ?? null;

                if (!$mediaId) {
                    $this->command->warn("Media tidak ditemukan untuk: {$fileName}");
                    continue;
                }

                $itemNumber = $attachedCount + 1;
                $syncData[$mediaId] = [
                    'judul_item' => 'Foto ' . $itemNumber,
                    'keterangan_singkat' => 'Dokumentasi ' . $albumData['judul'] . ' #' . $itemNumber,
                    'urutan' => $itemNumber,
                ];
                $attachedCount++;
            }

            $galeri->media()->sync($syncData);

            $this->command->info("Album \"{$galeri->judul}\" berhasil disinkronkan dengan {$attachedCount} foto.");
        }
    }
}
