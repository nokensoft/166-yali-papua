@extends('layouts.visitor')
@section('title', 'Foto Bercerita - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Foto Bercerita - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Kumpulan foto bercerita kegiatan dan dampak pelestarian lingkungan ' . ($situs['nama_situs'] ?? 'YALI Papua'))

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Foto Bercerita','item'=>route('foto-bercerita')]]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')

<section class="relative bg-gradient-to-br from-primary-800 via-primary-900 to-secondary-900 h-[150px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-secondary-400 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-5xl sm:text-6xl font-extrabold mb-4">Foto Bercerita</h1>
    </div>
</section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto mb-10">
                <form method="GET" action="{{ route('foto-bercerita') }}">
                    <div class="relative">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari album foto bercerita..."
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
                        <a href="{{ route('foto-bercerita') }}" class="ml-2 text-primary-700 hover:text-primary-800 font-semibold transition">
                            <i class="fa-solid fa-xmark mr-1"></i>Reset
                        </a>
                    </div>
                @endif
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($fotoBerceritaList as $album)
                    @php
                        $cover = $album->coverMedia ?: $album->media->first();
                        $mediaCount = $album->media_count ?? $album->media->count();
                        $tanggal = $album->created_at ? $album->created_at->translatedFormat('M Y') : null;
                        $ringkasan = $album->deskripsi ?: ($album->media->first()?->pivot->keterangan_singkat ?? null);
                    @endphp
                    <a href="{{ route('foto-bercerita.detail', $album->slug) }}"
                        class="group block bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="relative overflow-hidden bg-gray-100" style="aspect-ratio: 1720 / 1080;">
                            @if ($cover && $cover->tipe === 'video')
                                <img src="{{ 'https://img.youtube.com/vi/' . $cover->file_name . '/hqdefault.jpg' }}" alt="{{ $album->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    onerror="this.onerror=null;this.src='https://placehold.co/1720x1080'">
                            @elseif ($cover)
                                <img src="{{ asset('storage/' . $cover->file_path) }}" alt="{{ $album->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    onerror="this.onerror=null;this.src='https://placehold.co/1720x1080'">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary-500 to-secondary-600 flex items-center justify-center">
                                    <i class="fa-solid fa-images text-6xl text-white/30"></i>
                                </div>
                            @endif
                            <div class="absolute bottom-3 right-3 bg-black/40 backdrop-blur-sm text-white text-xs px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-images mr-1"></i> {{ $mediaCount }} Item Foto
                            </div>
                        </div>
                        <div class="p-5">
                            @if ($tanggal)
                                <span class="text-xs text-gray-400">{{ $tanggal }}</span>
                            @endif
                            <h3 class="text-base font-bold text-gray-900 mt-1 mb-2 group-hover:text-primary-700 transition line-clamp-2">{{ $album->judul }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ strip_tags($ringkasan ?: 'Dokumentasi kegiatan pelestarian lingkungan bersama masyarakat Papua.') }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16 text-gray-400">
                        <i class="fa-solid fa-images text-5xl mb-4 block"></i>
                        <p class="text-lg">Belum ada album foto bercerita.</p>
                    </div>
                @endforelse
            </div>

            @if ($fotoBerceritaList->hasPages())
                <div class="mt-10">{{ $fotoBerceritaList->links() }}</div>
            @endif
        </div>
    </section>
@endsection
