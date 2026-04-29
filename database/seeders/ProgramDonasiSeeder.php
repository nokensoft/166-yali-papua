<?php

namespace Database\Seeders;

use App\Models\ProgramDonasi;
use Illuminate\Database\Seeder;

class ProgramDonasiSeeder extends Seeder
{
    public function run(): void
    {
        $mediaId = null;

        $programs = [
            [
                'judul'          => 'Promosi Usaha',
                'deskripsi'      => 'Pembuatan katalog digital dan media promosi digital UMKM lokal Papua. Program ini bertujuan membantu pelaku usaha kecil dan menengah di kampung-kampung Papua untuk memasarkan produk mereka secara digital, menjangkau pasar yang lebih luas, dan meningkatkan pendapatan keluarga.',
                'media_id'       => $mediaId,
                'target_nominal' => 25000000,
                'is_active'      => true,
                'user_id'        => 1,
            ],
            [
                'judul'          => 'Ekonomi Kerakyatan',
                'deskripsi'      => 'Pengembangan potensi ekonomi masyarakat adat Papua, aksesibilitas pasar, dan sistem saving/simpanan keuangan komunitas. Program ini mendukung pengembangan koperasi dan kelompok simpan-pinjam di tingkat kampung agar masyarakat memiliki kemandirian finansial.',
                'media_id'       => $mediaId,
                'target_nominal' => 50000000,
                'is_active'      => true,
                'user_id'        => 1,
            ],
            [
                'judul'          => 'Penguatan Masyarakat Adat',
                'deskripsi'      => 'Program penguatan kelembagaan adat, pengorganisasian masyarakat, pemetaan wilayah adat, dan kajian sosial budaya untuk memperkuat posisi dan hak masyarakat adat di Tanah Papua.',
                'media_id'       => $mediaId,
                'target_nominal' => 30000000,
                'is_active'      => true,
                'user_id'        => 1,
            ],
        ];

        foreach ($programs as $item) {
            ProgramDonasi::create($item);
        }

        $this->command->info('ProgramDonasiSeeder: ' . count($programs) . ' program donasi berhasil dibuat.');
    }
}
