<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\KategoriBlog;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $sourceDir = public_path('blogs');

        if (!File::isDirectory($sourceDir)) {
            $this->command->warn('Direktori public/blogs/ tidak ditemukan.');
            return;
        }

        $directories = collect(File::directories($sourceDir))
            ->sort()
            ->take(5)
            ->values();

        if ($directories->isEmpty()) {
            $this->command->warn('Tidak ada folder blog di public/blogs/.');
            return;
        }

        $kategoriId = KategoriBlog::where('nama', 'Blog & Informasi')->value('id')
            ?? KategoriBlog::query()->value('id');

        if (!$kategoriId) {
            $this->command->warn('Kategori blog tidak ditemukan. Jalankan KategoriBlogSeeder terlebih dahulu.');
            return;
        }

        Blog::withTrashed()->forceDelete();

        $userId = 2;
        $created = 0;
        $total = $directories->count();

        foreach ($directories as $index => $directory) {
            $markdownFile = collect(File::files($directory))
                ->first(fn ($file) => strtolower($file->getExtension()) === 'md');

            if (!$markdownFile) {
                $this->command->warn("File markdown tidak ditemukan di {$directory}.");
                continue;
            }

            [$judul, $isiMarkdown] = $this->extractTitleAndContent(
                File::get($markdownFile->getPathname()),
                pathinfo($markdownFile->getFilename(), PATHINFO_FILENAME)
            );

            $kontenHtml = Str::markdown($isiMarkdown);
            $ringkasan = Str::limit(trim(strip_tags($kontenHtml)), 200);

            $imageFile = collect(File::files($directory))
                ->first(fn ($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'gif', 'webp'], true));

            $mediaId = $imageFile
                ? Media::where('file_path', 'media/blogs/' . $imageFile->getFilename())->value('id')
                : null;

            $publishedAt = now()->subDays($total - $index - 1);

            Blog::create([
                'judul'              => $judul,
                'slug'               => Str::slug($judul),
                'ringkasan'          => $ringkasan,
                'konten'             => $kontenHtml,
                'sumber_nama'        => null,
                'sumber_link'        => null,
                'kategori_berita_id' => $kategoriId,
                'media_id'           => $mediaId,
                'gambar_url'         => null,
                'user_id'            => $userId,
                'status'             => 'terbit',
                'tanggal_terbit'     => $publishedAt,
                'created_at'         => $publishedAt,
                'updated_at'         => $publishedAt,
            ]);

            $created++;
        }

        $this->command->info("BlogSeeder: {$created} postingan berhasil dibuat dari public/blogs/.");
    }

    private function extractTitleAndContent(string $rawMarkdown, string $fallbackTitle): array
    {
        $normalized = str_replace(["\r\n", "\r"], "\n", trim($rawMarkdown));

        $title = $fallbackTitle;
        if (preg_match('/^#\s+(.+)$/m', $normalized, $matches)) {
            $title = trim($matches[1]);
        }

        $parts = preg_split('/\n\s*ISI\s*:\s*\n/iu', $normalized, 2);
        $content = trim($parts[1] ?? $normalized);

        if ($content === '') {
            $content = trim($normalized);
        }

        return [$title, $content];
    }
}
