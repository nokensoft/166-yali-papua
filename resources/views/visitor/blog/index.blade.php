@extends('layouts.visitor')
@section('title', ($kategoriAktif ? $kategoriAktif->nama . ' - Berita' : 'Blog'))
@section('seo-title', ($kategoriAktif ? 'Berita ' . $kategoriAktif->nama : 'Blog — Berita & Artikel'))
@section('seo-description', ($kategoriAktif ? 'Berita kategori ' . $kategoriAktif->nama : 'Kumpulan berita dan artikel terbaru') . ' dari ' . ($situs['nama_situs'] ?? 'YALI Papua'))

@section('json-ld')
@php
$breadcrumb = [['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')]];
if ($kategoriAktif) {
    $breadcrumb[] = ['@type'=>'ListItem','position'=>2,'name'=>'Blog','item'=>route('berita')];
    $breadcrumb[] = ['@type'=>'ListItem','position'=>3,'name'=>$kategoriAktif->nama];
} else {
    $breadcrumb[] = ['@type'=>'ListItem','position'=>2,'name'=>'Blog'];
}
@endphp
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>$breadcrumb], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    @include('partials.page-banner', [
        'title' => ($kategoriAktif ? 'Berita: ' . $kategoriAktif->nama : 'Blog'),
        'breadcrumb' => ($kategoriAktif ? '<a href="' . route('berita') . '" class="hover:text-white transition">Blog</a> <i class="fa-solid fa-chevron-right text-xs mx-1"></i> ' . e($kategoriAktif->nama) : 'Blog'),
    ])

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
                @include('visitor.blog.partials.sidebar', [
                    'searchAction' => $kategoriAktif ? route('berita.kategori', $kategoriAktif->slug) : route('berita'),
                    'kategoriList' => $kategoriList,
                    'kategoriAktif' => $kategoriAktif,
                    'isSemuaBeritaActive' => !$kategoriAktif,
                ])

                {{-- Main Content (Kanan) --}}
                <div class="lg:col-span-3 order-1 lg:order-2">
                    @if (request('cari'))
                        <div class="mb-6 flex items-center gap-3 text-lg text-neutral-500">
                            <span>Hasil pencarian: <strong class="text-neutral-900">"{{ request('cari') }}"</strong></span>
                            <a href="{{ $kategoriAktif ? route('berita.kategori', $kategoriAktif->slug) : route('berita') }}" class="text-secondary hover:underline text-lg">
                                <i class="fa-solid fa-times mr-1"></i>Hapus
                            </a>
                        </div>
                    @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse ($beritaList as $b)
                            <a href="{{ route('berita.detail', $b->slug) }}" class="group cursor-pointer fade-in block">
                                <div class="relative overflow-hidden bg-gray-100 mb-6 shadow-md">
                                    <img src="{{ $b->gambar }}" alt="{{ $b->judul }}" class="w-full h-full object-cover transition-all duration-500 scale-100 group-hover:scale-105">
                                </div>
                                <div class="space-y-3">
                                    <h3 class="text-xl font-bold leading-snug group-hover:text-secondary transition line-clamp-2">{{ $b->judul }}</h3>
                                    @if ($b->ringkasan)
                                        <p class="text-gray-500 line-clamp-3">{{ $b->ringkasan }}</p>
                                    @endif
                                </div>
                            </a>
                        @empty
                            <div class="col-span-full text-center py-12 text-neutral-400">
                                <i class="fa-solid fa-newspaper text-4xl mb-3 block"></i>
                                <p>Tidak ada postingan.</p>
                            </div>
                        @endforelse
                    </div>
                    @if ($beritaList->hasPages())
                        <div class="mt-8">{{ $beritaList->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
