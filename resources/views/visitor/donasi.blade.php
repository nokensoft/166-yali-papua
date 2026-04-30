@extends('layouts.visitor')
@section('title', 'Donasi - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Donasi untuk ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Informasi donasi untuk mendukung program masyarakat adat Papua melalui transfer rekening resmi dan FAQ donasi.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Donasi']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    @php
        $rekeningBni = $situs['donasi_rek_bni'] ?? '1984081278';
        $atasNama = $situs['nama_situs_en'] ?? 'Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua';
    @endphp

    @include('partials.page-banner', [
        'title' => 'Donasi',
        'breadcrumb' => 'Donasi',
    ])

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-10 fade-in">
                    <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-heart mr-2"></i>Dukung Gerakan Kami</p>
                    <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Informasi Donasi</h2>
                    <p class="text-neutral-500 mt-3">Donasi saat ini dilakukan melalui transfer ke rekening resmi berikut.</p>
                </div>

                <div class="bg-white border border-neutral-200 shadow-card rounded-lg p-8 mb-8 fade-in">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-secondary/10 text-secondary flex items-center justify-center rounded-md shrink-0">
                            <i class="fa-solid fa-building-columns text-xl"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-1">Rekening Donasi Resmi</p>
                            <h3 class="text-xl font-display font-bold text-neutral-900 mb-3">Bank BNI</h3>
                            <div class="bg-neutral-50 border border-neutral-200 rounded-md p-4">
                                <p class="text-lg text-neutral-500 mb-1">Nomor Rekening</p>
                                <p class="font-mono font-bold text-2xl text-neutral-900 tracking-wide">{{ $rekeningBni }}</p>
                                <p class="text-lg text-neutral-500 mt-2">Atas Nama: <span class="font-semibold text-neutral-800">{{ $atasNama }}</span></p>
                            </div>
                            <p class="text-lg text-neutral-500 mt-4">Jika sudah transfer, silakan simpan bukti transfer dan hubungi admin melalui halaman kontak untuk konfirmasi manual.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral-50 border border-neutral-200 rounded-lg p-8 fade-in">
                    <h3 class="text-xl font-display font-bold text-neutral-900 mb-6">FAQ Donasi</h3>
                    <div class="space-y-3">
                        <details class="bg-white border border-neutral-200 rounded-md p-4 group" open>
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>1. Bagaimana cara berdonasi?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Lakukan transfer ke rekening donasi resmi yang tercantum di atas. Sertakan nama pengirim agar mudah diverifikasi.</p>
                        </details>

                        <details class="bg-white border border-neutral-200 rounded-md p-4 group">
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>2. Apakah donasi bisa anonim?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Bisa. Saat konfirmasi manual ke admin, Anda dapat menyampaikan bahwa donasi ingin ditampilkan sebagai anonim.</p>
                        </details>

                        <details class="bg-white border border-neutral-200 rounded-md p-4 group">
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>3. Apakah ada nominal minimum donasi?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Tidak ada nominal minimum. Setiap kontribusi sangat berarti untuk mendukung program pemberdayaan masyarakat adat Papua.</p>
                        </details>

                        <details class="bg-white border border-neutral-200 rounded-md p-4 group">
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>4. Bagaimana cara konfirmasi setelah transfer?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Siapkan bukti transfer lalu kirimkan melalui kanal komunikasi resmi di halaman <a href="{{ route('kontak') }}" class="text-secondary underline font-semibold">Kontak</a>.</p>
                        </details>

                        <details class="bg-white border border-neutral-200 rounded-md p-4 group">
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>5. Untuk apa donasi digunakan?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Donasi digunakan untuk mendukung kegiatan edukasi, penguatan kelembagaan adat, dan program pemberdayaan masyarakat sesuai misi organisasi.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
