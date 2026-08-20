@extends('layouts.visitor')
@section('title', ($kategoriAktif ? $kategoriAktif->nama . ' - Blog' : 'Blog'))
@section('seo-title', ($kategoriAktif ? 'Blog ' . $kategoriAktif->nama : 'Blog — YALI Papua'))
@section('seo-description', ($kategoriAktif ? 'Postingan blog kategori ' . $kategoriAktif->nama : 'Kumpulan postingan blog terbaru') . ' dari ' . ($situs['nama_situs'] ?? 'YALI Papua'))

@section('json-ld')
@php
    $breadcrumb = [['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => route('beranda')]];
    if ($kategoriAktif) {
        $breadcrumb[] = ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog')];
        $breadcrumb[] = ['@type' => 'ListItem', 'position' => 3, 'name' => $kategoriAktif->nama];
    } else {
        $breadcrumb[] = ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog'];
    }
@endphp
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>$breadcrumb], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    {{-- @include('partials.page-banner', [
        'title' => ($kategoriAktif ? 'Blog: ' . $kategoriAktif->nama : 'Blog'),
        'breadcrumb' => ($kategoriAktif ? '<a href="' . route('blog') . '" class="hover:text-white transition">Blog</a> <i class="fa-solid fa-chevron-right text-xs mx-1"></i> ' . e($kategoriAktif->nama) : 'Blog'),
    ]) --}}

    

<section class="relative bg-gradient-to-br from-primary-800 via-primary-900 to-secondary-900 h-[150px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-secondary-400 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-5xl sm:text-6xl font-extrabold mb-4">Blog</h1>
    </div>
</section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-4 gap-10">
                <div class="lg:col-span-3">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('blog') }}"
                               class="px-4 py-2 rounded-full text-sm font-semibold border border-gray-200 transition {{ !$kategoriAktif ? 'bg-primary-600 text-white border-primary-600' : 'bg-white text-gray-600 hover:bg-primary-50 hover:text-primary-700' }}">
                                Semua
                            </a>
                            @foreach ($kategoriList as $kat)
                                @if ($kat->slug)
                                    <a href="{{ route('blog.kategori', $kat->slug) }}"
                                       class="px-4 py-2 rounded-full text-sm font-semibold border border-gray-200 transition {{ $kategoriAktif && $kategoriAktif->id === $kat->id ? 'bg-primary-600 text-white border-primary-600' : 'bg-white text-gray-600 hover:bg-primary-50 hover:text-primary-700' }}">
                                        {{ $kat->nama }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <p class="text-sm text-gray-400">
                            Menampilkan <span class="font-semibold text-gray-700">{{ number_format($blogList->total()) }}</span> blog
                        </p>
                    </div>

                    @if (request('cari'))
                        <div class="mb-6 flex flex-wrap items-center gap-3 text-sm text-gray-500">
                            <span>Hasil pencarian: <strong class="text-gray-800">"{{ request('cari') }}"</strong></span>
                            <a href="{{ $kategoriAktif ? route('blog.kategori', $kategoriAktif->slug) : route('blog') }}" class="text-primary-700 hover:underline font-semibold">
                                <i class="fa-solid fa-xmark mr-1"></i>Reset
                            </a>
                        </div>
                    @endif

                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        @forelse ($blogList as $item)
                            <article class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                                <a href="{{ route('blog.detail', $item->slug) }}" class="block">
                                    <div class="h-48 overflow-hidden relative bg-gradient-to-br from-primary-100 to-secondary-100">
                                        <img src="{{ $item->gambar }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                                    </div>
                                </a>
                                <div class="p-5">
                                    <div class="flex items-center gap-3 mb-3 text-xs text-gray-400">
                                        <span class="inline-flex items-center px-2.5 py-0.5 bg-primary-50 text-primary-700 rounded-full font-semibold">
                                            {{ $item->kategori?->nama ?? 'Blog' }}
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-calendar mr-1"></i>{{ $item->tanggal_terbit?->translatedFormat('d M Y') ?? $item->created_at->translatedFormat('d M Y') }}
                                        </span>
                                    </div>
                                    <a href="{{ route('blog.detail', $item->slug) }}">
                                        <h3 class="text-base font-bold text-gray-900 mb-2 group-hover:text-primary-700 transition line-clamp-2">{{ $item->judul }}</h3>
                                    </a>
                                    <p class="text-sm text-gray-500 mb-4 line-clamp-3">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->ringkasan ?: $item->konten), 130) }}
                                    </p>
                                    <a href="{{ route('blog.detail', $item->slug) }}" class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-800 transition">
                                        Baca selengkapnya <i class="fa-solid fa-arrow-right ml-1.5 text-xs"></i>
                                    </a>
                                </div>
                            </article>
                        @empty
                            <div class="col-span-full text-center py-20">
                                <i class="fa-solid fa-folder-open text-5xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 font-medium">Tidak ada postingan ditemukan.</p>
                                <a href="{{ route('blog') }}" class="inline-flex items-center mt-4 px-5 py-2 bg-primary-600 text-white text-sm font-semibold rounded-full hover:bg-primary-700 transition">
                                    Reset Filter
                                </a>
                            </div>
                        @endforelse
                    </div>

                    @if ($blogList->hasPages())
                        <div class="mt-10">
                            {{ $blogList->links() }}
                        </div>
                    @endif
                </div>

                @include('visitor.blog.partials.sidebar', [
                    'searchAction' => $kategoriAktif ? route('blog.kategori', $kategoriAktif->slug) : route('blog'),
                    'kategoriList' => $kategoriList,
                    'kategoriAktif' => $kategoriAktif,
                    'isSemuaBlogActive' => !$kategoriAktif,
                    'blogPopuler' => $blogPopuler,
                ])
            </div>
        </div>
    </section>
@endsection
