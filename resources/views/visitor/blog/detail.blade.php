@extends('layouts.visitor')
@section('title', $blog->judul)
@section('seo-title', $blog->judul)
@section('seo-description', Str::limit(strip_tags($blog->ringkasan ?? $blog->konten), 160))
@section('seo-image', $blog->gambar)
@section('og-type', 'article')

@section('json-ld')
@php
    $_article = [
        '@context' => 'https://schema.org',
        '@type' => 'NewsArticle',
        'headline' => $blog->judul,
        'description' => Str::limit(strip_tags($blog->ringkasan ?? $blog->konten), 160),
        'image' => $blog->gambar,
        'datePublished' => $blog->tanggal_terbit?->toW3cString(),
        'dateModified' => $blog->updated_at?->toW3cString(),
        'author' => ['@type' => 'Person', 'name' => $blog->user?->name ?? ($situs['nama_situs'] ?? 'YALI Papua')],
        'publisher' => ['@type' => 'Organization', 'name' => $situs['nama_situs'] ?? 'YALI Papua', 'logo' => ['@type' => 'ImageObject', 'url' => asset('img/logo-yali-papua.png')]],
        'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => route('blog.detail', $blog->slug)],
        'articleSection' => $blog->kategori?->nama ?? 'Blog',
    ];
    $_bc = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
        ['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],
        ['@type'=>'ListItem','position'=>2,'name'=>'Blog','item'=>route('blog')],
        ['@type'=>'ListItem','position'=>3,'name'=>$blog->judul],
    ]];
    $_f = JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
@endphp
<script type="application/ld+json">{!! json_encode($_article, $_f) !!}</script>
<script type="application/ld+json">{!! json_encode($_bc, $_f) !!}</script>
@endsection

@section('content')
    @include('partials.page-banner', [
        'title' => 'Detail Blog',
        'breadcrumb' => '<a href="' . route('blog') . '" class="hover:text-white transition">Blog</a> <i class="fa-solid fa-chevron-right text-xs mx-1"></i> Detail',
    ])

    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-10">
                <article class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="h-64 sm:h-80 lg:h-96 relative overflow-hidden bg-gradient-to-br from-primary-100 to-secondary-100">
                            <img src="{{ $blog->gambar }}" alt="{{ $blog->judul }}" class="w-full h-full object-cover" />
                            @if ($blog->kategori)
                                <div class="absolute top-4 left-4">
                                    <span class="inline-flex items-center px-4 py-1.5 bg-white/90 backdrop-blur-sm text-primary-700 rounded-full text-sm font-bold shadow">
                                        {{ $blog->kategori->nama }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-6 sm:p-8 lg:p-10">
                            <div class="flex flex-wrap items-center gap-4 mb-6 text-sm text-gray-400">
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ $blog->tanggal_terbit?->translatedFormat('d M Y') ?? $blog->created_at->translatedFormat('d M Y') }}
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-eye"></i>
                                    {{ number_format($blog->jumlah_dibaca ?? 0) }} dibaca
                                </span>
                            </div>

                            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 mb-8 leading-tight">{{ $blog->judul }}</h1>

                            <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed space-y-5">
                                {!! $blog->konten !!}
                            </div>

                            @if ($blog->sumber_nama)
                                <div class="mt-8 p-4 rounded-xl bg-gray-50 border border-gray-100 text-sm text-gray-500">
                                    <i class="fa-solid fa-link mr-1"></i>Sumber:
                                    @if ($blog->sumber_link)
                                        <a href="{{ $blog->sumber_link }}" target="_blank" rel="noopener noreferrer" class="text-primary-700 hover:underline">{{ $blog->sumber_nama }}</a>
                                    @else
                                        {{ $blog->sumber_nama }}
                                    @endif
                                </div>
                            @endif

                            <div class="mt-10 pt-8 border-t border-gray-100" x-data="{ copied: false }">
                                <div class="flex flex-wrap items-center gap-3">
                                    <span class="text-sm font-semibold text-gray-700"><i class="fa-solid fa-share-nodes mr-1"></i> Bagikan:</span>
                                    <button @click="navigator.clipboard.writeText('{{ route('blog.detail', $blog->slug) }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                            class="w-9 h-9 bg-gray-600 hover:bg-gray-700 text-white rounded-lg flex items-center justify-center transition text-sm"
                                            :title="copied ? 'Tersalin' : 'Salin URL'">
                                        <i class="fas" :class="copied ? 'fa-check' : 'fa-link'"></i>
                                    </button>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.detail', $blog->slug)) }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-blue-600 hover:bg-blue-700 text-white rounded-lg flex items-center justify-center transition text-sm">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.detail', $blog->slug)) }}&text={{ urlencode($blog->judul) }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-sky-500 hover:bg-sky-600 text-white rounded-lg flex items-center justify-center transition text-sm">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($blog->judul . ' - ' . route('blog.detail', $blog->slug)) }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-green-600 hover:bg-green-700 text-white rounded-lg flex items-center justify-center transition text-sm">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

               
                    @if ($blogTerkait->count())
                        <div class="mt-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Blog Terkait</h3>
                            <div class="grid sm:grid-cols-2 gap-4">
                                @foreach ($blogTerkait as $item)
                                    <a href="{{ route('blog.detail', $item->slug) }}" class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:border-primary-200 transition">
                                        <img src="{{ $item->gambar }}" class="w-full h-40 object-cover" alt="{{ $item->judul }}">
                                        <div class="p-4">
                                            <h4 class="text-sm font-bold text-gray-900 group-hover:text-primary-700 transition line-clamp-2">{{ $item->judul }}</h4>
                                            <p class="text-xs text-gray-400 mt-2">{{ $item->tanggal_terbit?->translatedFormat('d M Y') ?? $item->created_at->translatedFormat('d M Y') }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </article>

                @include('visitor.blog.partials.sidebar', [
                    'searchAction' => route('blog'),
                    'kategoriList' => $kategoriList,
                    'kategoriAktif' => $kategoriAktif,
                    'isSemuaBlogActive' => !$kategoriAktif,
                    'blogPopuler' => $blogPopuler,
                ])
            </div>
        </div>
    </section>
@endsection
