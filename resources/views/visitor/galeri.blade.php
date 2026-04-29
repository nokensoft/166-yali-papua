@extends('layouts.visitor')
@section('title', 'Galeri - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Galeri Foto - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Dokumentasi kegiatan dan galeri foto ' . ($situs['nama_situs'] ?? 'YALI Papua'))

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Galeri']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    <section class="relative bg-gradient-to-br from-primary-800 via-primary-900 to-secondary-900 py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-secondary-400 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <span class="inline-block px-4 py-1.5 bg-white/15 backdrop-blur-sm rounded-full text-sm font-medium mb-4 border border-white/20">
                <i class="fa-solid fa-camera mr-1"></i> Galeri
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">Foto Bercerita</h1>
            <p class="text-gray-300 max-w-2xl mx-auto">Kisah visual dari lapangan — dokumentasi perjalanan, aksi, dan dampak pelestarian lingkungan di Papua.</p>
            <nav class="mt-6 flex items-center justify-center gap-2 text-sm text-gray-300">
                <a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a>
                <i class="fa-solid fa-chevron-right text-xs"></i>
                <span class="text-white font-semibold">Foto Bercerita</span>
            </nav>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto mb-10">
                <form method="GET" action="{{ route('galeri') }}">
                    <div class="relative">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari album galeri..."
                            class="w-full border border-gray-200 rounded-full py-3 pl-12 pr-28 text-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-100 focus:outline-none transition">
                        <button type="submit" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-600 transition">
                            <i class="fa-solid fa-search"></i>
                        </button>
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-1.5 bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold rounded-full transition">
                            Cari
                        </button>
                    </div>
                </form>
                @if (request('cari'))
                    <div class="mt-3 text-center text-sm text-gray-500">
                        Hasil pencarian:
                        <strong class="text-gray-900">"{{ request('cari') }}"</strong>
                        <a href="{{ route('galeri') }}" class="ml-2 text-primary-700 hover:text-primary-800 font-semibold transition">
                            <i class="fa-solid fa-xmark mr-1"></i>Reset
                        </a>
                    </div>
                @endif
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($galeriList as $album)
                    @php
                        $cover = $album->media->first();
                        $mediaCount = $album->media_count ?? $album->media->count();
                        $tanggal = $album->created_at ? $album->created_at->translatedFormat('M Y') : null;
                    @endphp
                    <a href="{{ route('galeri.detail', $album->slug) }}"
                        class="group block bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="h-48 relative overflow-hidden bg-gray-100">
                            @if ($cover && $cover->tipe === 'video')
                                <img src="{{ 'https://img.youtube.com/vi/' . $cover->file_name . '/hqdefault.jpg' }}" alt="{{ $album->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    onerror="this.onerror=null;this.src='https://placehold.co/600x400'">
                            @elseif ($cover)
                                <img src="{{ asset('storage/' . $cover->file_path) }}" alt="{{ $album->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    onerror="this.onerror=null;this.src='https://placehold.co/600x400'">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary-500 to-secondary-600 flex items-center justify-center">
                                    <i class="fa-solid fa-images text-6xl text-white/30"></i>
                                </div>
                            @endif
                            <div class="absolute bottom-3 right-3 bg-black/40 backdrop-blur-sm text-white text-xs px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-images mr-1"></i> {{ $mediaCount }} Foto
                            </div>
                        </div>
                        <div class="p-5">
                            @if ($tanggal)
                                <span class="text-xs text-gray-400">{{ $tanggal }}</span>
                            @endif
                            <h3 class="text-base font-bold text-gray-900 mt-1 mb-2 group-hover:text-primary-700 transition line-clamp-2">{{ $album->judul }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $album->deskripsi ?: 'Dokumentasi kegiatan pelestarian lingkungan bersama masyarakat Papua.' }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16 text-gray-400">
                        <i class="fa-solid fa-images text-5xl mb-4 block"></i>
                        <p class="text-lg">Belum ada album di galeri.</p>
                    </div>
                @endforelse
            </div>

            @if ($galeriList->hasPages())
                <div class="mt-10">{{ $galeriList->links() }}</div>
            @endif
        </div>
    </section>
@endsection
