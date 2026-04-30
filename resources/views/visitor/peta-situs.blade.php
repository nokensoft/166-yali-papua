@extends('layouts.visitor')
@section('title', 'Peta Situs - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Peta Situs - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Daftar lengkap seluruh halaman publik pada situs ' . ($situs['nama_situs'] ?? 'YALI Papua') . ' untuk memudahkan navigasi pengunjung dan mesin pencari.')

@section('json-ld')
@php
$_bc = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],
    ['@type'=>'ListItem','position'=>2,'name'=>'Peta Situs'],
]];
$_f = JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
@endphp
<script type="application/ld+json">{!! json_encode($_bc, $_f) !!}</script>
@endsection

@section('content')
    @include('partials.page-banner', [
        'title' => 'Peta Situs',
        'breadcrumb' => 'Peta Situs',
    ])

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 space-y-10">

            {{-- Info XML Sitemap --}}
            <div class="bg-green-50 border border-secondary/20 p-6">
                <p class="text-lg text-secondary">
                    <i class="fa-solid fa-robot mr-1"></i>
                    Untuk crawler mesin pencari, sitemap XML tersedia di:
                    <a href="{{ url('/sitemap.xml') }}" class="font-semibold underline hover:text-secondary">{{ url('/sitemap.xml') }}</a>
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Halaman Utama --}}
                <div class="bg-neutral-50 border border-neutral-100 p-6">
                    <h2 class="text-lg font-display font-bold text-neutral-900 mb-4">
                        <i class="fa-solid fa-house text-secondary mr-2 text-lg"></i>Halaman Utama
                    </h2>
                    <ul class="space-y-2 text-lg">
                        <li><a href="{{ route('beranda') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Beranda</a></li>
                        <li><a href="{{ route('profil') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Profil Lembaga</a></li>
                        <li><a href="{{ route('sejarah') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Sejarah Singkat</a></li>
                        <li><a href="{{ route('kepengurusan') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Kepengurusan</a></li>
                        <li><a href="{{ route('pilar-kerja') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Program Kerja</a></li>
                        <li><a href="{{ route('mitra') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Mitra Kerja</a></li>
                        <li><a href="/faq" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>FAQ</a></li>
                        <li><a href="/disclaimer" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Disclaimer</a></li>
                        <li><a href="{{ route('program') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Program</a></li>
                        <li><a href="{{ route('blog') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Blog</a></li>
                        <li><a href="{{ route('foto-bercerita') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Foto Bercerita</a></li>
                        <li><a href="{{ route('donasi') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Donasi</a></li>
                        <li><a href="{{ route('kontak') }}" class="text-neutral-700 hover:text-secondary transition"><i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>Kontak</a></li>
                    </ul>
                </div>

                {{-- Halaman CMS --}}
                <div class="bg-neutral-50 border border-neutral-100 p-6">
                    <h2 class="text-lg font-display font-bold text-neutral-900 mb-4">
                        <i class="fa-solid fa-file-lines text-secondary mr-2 text-lg"></i>Halaman Lainnya
                    </h2>
                    <ul class="space-y-2 text-lg">
                        @forelse ($halamanList as $h)
                            @if (!in_array($h->slug, ['sejarah', 'profil', 'mitra', 'bidang-kerja']))
                                <li>
                                    @php
                                        try { $hUrl = route($h->slug); } catch (\Exception $e) { $hUrl = route('halaman.show', $h->slug); }
                                    @endphp
                                    <a href="{{ $hUrl }}" class="text-neutral-700 hover:text-secondary transition">
                                        <i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>{{ $h->judul }}
                                    </a>
                                </li>
                            @endif
                        @empty
                            <li class="text-neutral-400 text-lg">Belum ada halaman CMS aktif.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Kategori Blog --}}
                <div class="bg-neutral-50 border border-neutral-100 p-6">
                    <h2 class="text-lg font-display font-bold text-neutral-900 mb-4">
                        <i class="fa-solid fa-tags text-secondary mr-2 text-lg"></i>Kategori Blog
                    </h2>
                    <ul class="space-y-2 text-lg">
                        @forelse ($kategoriBlogList as $kat)
                            <li>
                                <a href="{{ route('blog.kategori', $kat->slug) }}" class="text-neutral-700 hover:text-secondary transition">
                                    <i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>{{ $kat->nama }}
                                    <span class="text-neutral-400 text-lg ml-1">({{ $kat->blog_count }})</span>
                                </a>
                            </li>
                        @empty
                            <li class="text-neutral-400 text-lg">Belum ada kategori blog.</li>
                        @endforelse
                    </ul>
                </div>
                {{-- Blog Terbaru --}}
                <div class="bg-neutral-50 border border-neutral-100 p-6">
                    <h2 class="text-lg font-display font-bold text-neutral-900 mb-4">
                        <i class="fa-solid fa-newspaper text-secondary mr-2 text-lg"></i>Blog Terbaru
                    </h2>
                    <ul class="space-y-2 text-lg">
                        @forelse ($blogTerbaru as $b)
                            <li>
                                <a href="{{ route('blog.detail', $b->slug) }}" class="text-neutral-700 hover:text-secondary transition">
                                    <i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>{{ $b->judul }}
                                </a>
                                <span class="text-neutral-400 text-lg ml-1">{{ $b->tanggal_terbit?->translatedFormat('d M Y') }}</span>
                            </li>
                        @empty
                            <li class="text-neutral-400 text-lg">Belum ada blog.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="grid md:grid-cols-1 gap-8">
                {{-- Album Foto Bercerita --}}
                <div class="bg-neutral-50 border border-neutral-100 p-6">
                    <h2 class="text-lg font-display font-bold text-neutral-900 mb-4">
                        <i class="fa-solid fa-images text-secondary mr-2 text-lg"></i>Album Foto Bercerita
                    </h2>
                    <ul class="space-y-2 text-lg">
                        @forelse ($fotoBerceritaTerbaru as $g)
                            <li>
                                <a href="{{ route('foto-bercerita.detail', $g->slug) }}" class="text-neutral-700 hover:text-secondary transition">
                                    <i class="fa-solid fa-angle-right text-neutral-300 mr-2 text-lg"></i>{{ $g->judul }}
                                </a>
                            </li>
                        @empty
                            <li class="text-neutral-400 text-lg">Belum ada album foto bercerita.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

        </div>
    </section>
@endsection
