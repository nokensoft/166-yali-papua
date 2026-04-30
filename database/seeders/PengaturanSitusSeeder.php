<?php

namespace Database\Seeders;

use App\Models\PengaturanSitus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PengaturanSitusSeeder extends Seeder
{
    public function run(): void
    {
        // Copy logo ke storage
        $logoSrc = public_path('img/logo-yali-papua.png');
        $logoPath = null;
        if (File::exists($logoSrc)) {
            $logoPath = 'situs/logo-yali-papua.png';
            Storage::disk('public')->put($logoPath, File::get($logoSrc));
            $this->command->info('Logo disalin ke storage: ' . $logoPath);
        }

        // Copy gambar kantor ke storage untuk OG Image
        $kantorSrc = public_path('img/logo-yali-papua.png');
        $ogImagePath = null;
        if (File::exists($kantorSrc)) {
            $ogImagePath = 'situs/og-image-yali-papua.png';
            Storage::disk('public')->put($ogImagePath, File::get($kantorSrc));
            $this->command->info('OG Image disalin ke storage: ' . $ogImagePath);
        }

        $settings = [
            // Umum
            'nama_situs'    => 'YALI Papua',
            'nama_situs_en' => 'Yayasan Lingkungan Hidup Papua (Papua Environmental Foundation)',
            'deskripsi_situs' => 'YALI Papua adalah yayasan lingkungan hidup yang berdedikasi untuk pelestarian alam dan pemberdayaan masyarakat adat di tanah Papua.',
            // Kontak
            'email'              => 'info@yalipapua.or.id',
            'email_direktur'     => 'kemitraan@yalipapua.or.id',
            'email_ketua'        => 'info@yalipapua.or.id',
            'telepon'            => '+62 823-1221-1707',
            'fax'                => '+62 823-1221-1707',
            'whatsapp_direktur'  => '6282312211707',
            'whatsapp_ketua'     => '6282312211707',
            'alamat'             => 'Jl. Raya Entrop No. 123, Jayapura, Papua, Indonesia 99224',
            'website'            => 'https://yalipapua.org',
            'logo'               => $logoPath,
            // Peta
            'koordinat_maps'   => '-2.594368° LS, 140.675205° BT (Kantor YALI Papua, Jayapura)',
            'google_maps_link' => 'https://maps.google.com/?q=Kantor+YALI+PAPUA+Jayapura',
            'google_maps_embed'=> 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1288.4177443635579!2d140.67520483229617!3d-2.594368156773075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686cf5f5d40a74f1%3A0xb3a6657cb7a0ecd5!2sKantor%20YALI%20PAPUA!5e1!3m2!1sid!2sid!4v1775786151058!5m2!1sid!2sid',
            // Media Sosial
            'sosmed_facebook'  => null,
            'sosmed_instagram' => null,
            'sosmed_youtube'   => null,
            'sosmed_twitter'   => null,
            'sosmed_tiktok'    => null,
            'sosmed_whatsapp'  => '6282312211707',
            // Rekening Donasi
            'donasi_rek_bri'     => null,
            'donasi_rek_bni'     => '1984081278',
            'donasi_rek_mandiri' => null,
            // SEO
            'seo_meta_keywords'   => 'YALI Papua, yayasan lingkungan hidup papua, pelestarian alam papua, masyarakat adat papua, konservasi papua, advokasi lingkungan',
            'seo_meta_description'=> 'Website resmi YALI Papua — yayasan lingkungan hidup yang berdedikasi untuk pelestarian alam dan pemberdayaan masyarakat adat di tanah Papua.',
            'seo_og_image'        => $ogImagePath,
        ];

        foreach ($settings as $key => $value) {
            PengaturanSitus::create(['key' => $key, 'value' => $value]);
        }
    }
}
