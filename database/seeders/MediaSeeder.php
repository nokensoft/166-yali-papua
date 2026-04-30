<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaSeeder extends Seeder
{
    private const ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    public function run(): void
    {
        $userId = 2;

        $galeriCount = $this->seedFlatDirectory(
            public_path('img/galeri'),
            'public/img/galeri/',
            'media',
            $userId
        );

        $blogCount = $this->seedBlogDirectory($userId);

        $this->command->info("MediaSeeder: {$galeriCount} media galeri dan {$blogCount} media blog berhasil disinkronkan.");
    }

    private function seedFlatDirectory(string $sourceDir, string $label, string $targetStorageDir, int $userId): int
    {
        if (!File::isDirectory($sourceDir)) {
            $this->command->warn("Direktori {$label} tidak ditemukan.");
            return 0;
        }

        $files = collect(File::files($sourceDir))
            ->filter(fn ($file) => $this->isAllowedImage($file->getExtension()))
            ->values();

        if ($files->isEmpty()) {
            $this->command->warn("Tidak ada file gambar di {$label}");
            return 0;
        }

        $count = 0;

        foreach ($files as $file) {
            $this->upsertMediaFromFile($file, $targetStorageDir, $userId);
            $count++;
        }

        return $count;
    }

    private function seedBlogDirectory(int $userId): int
    {
        $blogDir = public_path('blogs');

        if (!File::isDirectory($blogDir)) {
            $this->command->warn('Direktori public/blogs/ tidak ditemukan.');
            return 0;
        }

        $directories = collect(File::directories($blogDir))
            ->sort()
            ->take(5)
            ->values();

        if ($directories->isEmpty()) {
            $this->command->warn('Tidak ada folder blog di public/blogs/.');
            return 0;
        }

        $count = 0;

        foreach ($directories as $directory) {
            $imageFile = collect(File::files($directory))
                ->first(fn ($file) => $this->isAllowedImage($file->getExtension()));

            if (!$imageFile) {
                $this->command->warn("Tidak ada gambar blog di {$directory}.");
                continue;
            }

            $this->upsertMediaFromFile($imageFile, 'media/blogs', $userId);
            $count++;
        }

        return $count;
    }

    private function upsertMediaFromFile($file, string $targetStorageDir, int $userId): void
    {
        $fileName = $file->getFilename();
        $storagePath = trim($targetStorageDir, '/') . '/' . $fileName;

        Storage::disk('public')->put($storagePath, File::get($file->getPathname()));

        $judul = Str::title(
            str_replace(['-', '_'], ' ', pathinfo($fileName, PATHINFO_FILENAME))
        );

        $media = Media::withTrashed()->where('file_path', $storagePath)->first();

        if (!$media) {
            $media = new Media();
        }

        $media->judul = $judul;
        $media->tipe = 'foto';
        $media->file_path = $storagePath;
        $media->file_name = $fileName;
        $media->file_size = $file->getSize();
        $media->user_id = $userId;
        $media->save();

        if ($media->trashed()) {
            $media->restore();
        }
    }

    private function isAllowedImage(string $extension): bool
    {
        return in_array(strtolower($extension), self::ALLOWED_EXTENSIONS, true);
    }
}
