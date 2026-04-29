@extends('layouts.visitor')
@section('title', $berita->judul)
@section('seo-title', $berita->judul)
@section('seo-description', Str::limit(strip_tags($berita->ringkasan ?? $berita->konten), 160))
@section('seo-image', $berita->gambar)
@section('og-type', 'article')

@section('json-ld')
@php
$_article = [
    '@context' => 'https://schema.org',
    '@type' => 'NewsArticle',
    'headline' => $berita->judul,
    'description' => Str::limit(strip_tags($berita->ringkasan ?? $berita->konten), 160),
    'image' => $berita->gambar,
    'datePublished' => $berita->tanggal_terbit?->toW3cString(),
    'dateModified' => $berita->updated_at?->toW3cString(),
    'author' => ['@type' => 'Person', 'name' => $berita->user?->name ?? ($situs['nama_situs'] ?? 'YALI Papua')],
    'publisher' => ['@type' => 'Organization', 'name' => $situs['nama_situs'] ?? 'YALI Papua', 'logo' => ['@type' => 'ImageObject', 'url' => asset('img/logo-yali-papua.png')]],
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => route('berita.detail', $berita->slug)],
    'articleSection' => $berita->kategori?->nama ?? 'Berita',
];
$_bc = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],
    ['@type'=>'ListItem','position'=>2,'name'=>'Blog'],
]];
$_f = JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
@endphp
<script type="application/ld+json">{!! json_encode($_article, $_f) !!}</script>
<script type="application/ld+json">{!! json_encode($_bc, $_f) !!}</script>
@endsection

@section('content')
    @include('partials.page-banner', [
        'title' => 'Detail Artikel',
        'breadcrumb' => '<a href="' . route('berita') . '" class="hover:text-white transition">Blog</a> <i class="fa-solid fa-chevron-right text-xs mx-1"></i> Detail',
    ])

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                @include('visitor.blog.partials.sidebar', [
                    'searchAction' => route('berita'),
                    'kategoriList' => $kategoriList,
                    'kategoriAktif' => $kategoriAktif,
                    'isSemuaBeritaActive' => !$kategoriAktif,
                ])
                {{-- Main Content (Kanan) --}}
                <div class="lg:col-span-3 order-1 lg:order-2">
                    <div class="bg-white border border-gray-100 shadow-sm rounded-lg p-6 md:p-8">
                        <div class="space-y-4 mb-8">
                            @if ($berita->kategori)
                                <span class="inline-block text-lg bg-secondary text-white px-3 py-1 font-bold uppercase">{{ $berita->kategori->nama }}</span>
                            @endif
                            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 leading-tight">{{ $berita->judul }}</h2>
                            <p class="text-neutral-500 text-lg">
                                {{ $berita->tanggal_terbit?->translatedFormat('d M Y') }}
                                @if ($berita->user) &middot; {{ $berita->user->name }} @endif
                            </p>
                        </div>
                        <div class="mb-8 flex justify-center">
                            <img src="{{ $berita->gambar }}" alt="{{ $berita->judul }}" class="w-[720px] shadow-lg object-cover">
                        </div>
                        <div class="prose max-w-none text-lg leading-relaxed text-justify">
                            {!! $berita->konten !!}
                        </div>
                        @if ($berita->sumber_nama)
                            <div class="mt-8 pt-6 border-t border-gray-200">
                                <p class="text-lg text-gray-500">
                                    <i class="fas fa-link mr-1"></i> Sumber:
                                    @if ($berita->sumber_link)
                                        <a href="{{ $berita->sumber_link }}" target="_blank" class="text-secondary hover:underline">{{ $berita->sumber_nama }}</a>
                                    @else
                                        {{ $berita->sumber_nama }}
                                    @endif
                                </p>
                            </div>
                        @endif
                        {{-- Share Buttons --}}
                        <div class="mt-8 pt-6 border-t border-gray-200" x-data="{ copied: false }">
                            <p class="text-lg font-bold uppercase text-gray-500 mb-3">Bagikan</p>
                            <div class="flex flex-wrap gap-3">
                                <button @click="navigator.clipboard.writeText('{{ route('berita.detail', $berita->slug) }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                        class="flex items-center gap-2 px-4 py-2.5 border border-gray-300 text-gray-600 hover:border-secondary hover:text-secondary transition text-lg font-semibold">
                                    <i class="fas" :class="copied ? 'fa-check' : 'fa-link'"></i>
                                    <span x-text="copied ? 'Tersalin!' : 'Salin URL'"></span>
                                </button>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('berita.detail', $berita->slug)) }}&text={{ urlencode($berita->judul) }}" target="_blank"
                                   class="flex items-center gap-2 px-4 py-2.5 bg-black text-white hover:bg-gray-800 transition text-lg font-semibold">
                                    <i class="fab fa-x-twitter"></i> Post
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('berita.detail', $berita->slug)) }}" target="_blank"
                                   class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white hover:bg-blue-700 transition text-lg font-semibold">
                                    <i class="fab fa-facebook-f"></i> Share
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('berita.detail', $berita->slug)) }}" target="_blank"
                                   class="flex items-center gap-2 px-4 py-2.5 bg-sky-700 text-white hover:bg-sky-800 transition text-lg font-semibold">
                                    <i class="fab fa-linkedin-in"></i> LinkedIn
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($beritaTerkait->count())
                        <div class="mt-10">
                            <h3 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-6">Postingan Terkait</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($beritaTerkait as $bl)
                                    <a href="{{ route('berita.detail', $bl->slug) }}" class="block border border-neutral-200 rounded-md overflow-hidden hover:bg-white transition">
                                        <img src="{{ $bl->gambar }}" class="w-full h-48 object-cover" alt="{{ $bl->judul }}">
                                        <div class="p-4">
                                            <h5 class="text-lg font-bold line-clamp-2">{{ $bl->judul }}</h5>
                                            {{-- <p class="text-lg text-neutral-400 mt-1">{{ $bl->tanggal_terbit?->translatedFormat('d M Y') }}</p> --}}
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
