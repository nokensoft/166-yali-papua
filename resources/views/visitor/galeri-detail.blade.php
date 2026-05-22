@extends('layouts.visitor')
@section('title', $galeri->judul . ' - Foto Bercerita - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', $galeri->judul . ' - Foto Bercerita')
@section('seo-description', strip_tags($galeri->deskripsi ?: 'Album foto bercerita ' . $galeri->judul))
@php
    $seoCover = $galeri->coverMedia ?: $galeri->media->first();
@endphp
@if ($seoCover)
    @section('seo-image', $seoCover->tipe === 'video' ? 'https://img.youtube.com/vi/' . $seoCover->file_name . '/hqdefault.jpg' : asset('storage/' . $seoCover->file_path))
@endif

@section('json-ld')
@php
$_bc = ['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[
    ['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],
    ['@type'=>'ListItem','position'=>2,'name'=>'Foto Bercerita','item'=>route('foto-bercerita')],
    ['@type'=>'ListItem','position'=>3,'name'=>$galeri->judul],
]];
$_ig = ['@context'=>'https://schema.org','@type'=>'ImageGallery','name'=>$galeri->judul,'description'=>strip_tags($galeri->deskripsi ?? 'Album foto bercerita '.$galeri->judul),'url'=>route('foto-bercerita.detail',$galeri->slug),'numberOfItems'=>$galeri->media->count()];
$_f = JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
@endphp
<script type="application/ld+json">{!! json_encode($_bc, $_f) !!}</script>
<script type="application/ld+json">{!! json_encode($_ig, $_f) !!}</script>
@endsection

@section('content')
    <section class="relative bg-gradient-to-br from-primary-800 via-primary-900 to-secondary-900 py-16 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <nav class="flex items-center gap-2 text-sm text-gray-300">
                    <a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a>
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                    <a href="{{ route('foto-bercerita') }}" class="hover:text-white transition">Foto Bercerita</a>
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                    <span class="text-white font-semibold">{{ $galeri->judul }}</span>
                </nav>
                <div class="inline-flex items-center text-sm text-gray-200">
                    <i class="fa-regular fa-eye mr-1.5"></i> {{ number_format($galeri->jumlah_dibaca ?? 0) }} dibaca
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $totalCount = $galeri->media->count();
                $tanggal = $galeri->created_at ? $galeri->created_at->translatedFormat('d F Y') : '-';
                $mediaItems = $galeri->media->values();
                $cover = $galeri->coverMedia ?: $galeri->media->first();
                $defaultDeskripsi = '<p>Dokumentasi visual kegiatan pelestarian lingkungan dan pemberdayaan masyarakat di Papua.</p>';
            @endphp
            <div id="foto-item-cover" data-foto-item class="scroll-mt-32 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
                @if ($cover)
                    <div class="relative overflow-hidden bg-gray-100" style="aspect-ratio: 1720 / 1080;">
                        @if ($cover->tipe === 'video')
                            <img src="https://img.youtube.com/vi/{{ $cover->file_name }}/hqdefault.jpg"
                                class="w-full h-full object-cover"
                                alt="{{ $galeri->judul }} - Cover"
                                onerror="this.onerror=null;this.src='https://placehold.co/1720x1080'">
                            <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                                <span class="bg-red-600/90 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg">
                                    <i class="fa-solid fa-play text-xl ml-1"></i>
                                </span>
                            </div>
                        @else
                            <img src="{{ asset('storage/' . $cover->file_path) }}"
                                class="w-full h-full object-cover"
                                alt="{{ $galeri->judul }} - Cover"
                                onerror="this.onerror=null;this.src='https://placehold.co/1720x1080'">
                        @endif
                        <div class="absolute top-4 left-4 bg-black/40 backdrop-blur-sm text-white text-xs px-3 py-1.5 rounded-full font-semibold">
                            Foto Cover
                        </div>
                    </div>
                @endif

                <div class="p-6 sm:p-8">
                    <div class="flex flex-wrap items-center gap-3 mb-3 text-sm text-gray-400">
                        <span><i class="fa-solid fa-calendar mr-1"></i> {{ $tanggal }}</span>
                        <span><i class="fa-solid fa-images mr-1"></i> {{ $totalCount }} Item Foto</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 mb-4">{{ $galeri->judul }}</h1>
                    <div class="prose tinymce-content max-w-none text-gray-600 leading-relaxed">
                        {!! $galeri->deskripsi ?: $defaultDeskripsi !!}
                    </div>
                </div>
            </div>
            @if ($totalCount > 0)
                <nav aria-label="Navigasi item foto bercerita" class="fixed top-1/2 -translate-y-1/2 z-40" style="right: max(0.5rem, calc((100vw - 56rem) / 2 - 2.75rem));">
                    <div class="bg-white/95 backdrop-blur-sm border border-gray-200 shadow-lg rounded-2xl p-2 max-h-[70vh] overflow-y-auto">
                        <div class="flex flex-col gap-2">
                            <a href="#foto-item-cover"
                                data-foto-nav-link
                                data-target="foto-item-cover"
                                class="foto-nav-link w-8 h-8 sm:w-9 sm:h-9 rounded-full border text-xs font-bold flex items-center justify-center transition bg-primary-600 text-white border-primary-600 shadow-md hover:bg-primary-600 hover:text-white"
                                aria-label="Lompat ke cover album"
                                aria-current="true">
                                0
                            </a>
                            @foreach ($mediaItems as $index => $navItem)
                                <a href="#foto-item-{{ $index + 1 }}"
                                    data-foto-nav-link
                                    data-target="foto-item-{{ $index + 1 }}"
                                    class="foto-nav-link w-8 h-8 sm:w-9 sm:h-9 rounded-full border text-xs font-bold flex items-center justify-center transition bg-white border-primary-200 text-primary-700 hover:bg-primary-600 hover:text-white"
                                    aria-label="Lompat ke item foto {{ $index + 1 }}"
                                    aria-current="false">
                                    {{ $index + 1 }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </nav>
            @endif

            <div class="space-y-8">
                @forelse ($mediaItems as $index => $m)
                    @php
                        $itemJudul = $m->pivot->judul_item ?: ('Foto ' . ($index + 1));
                        $itemKeterangan = $m->pivot->keterangan_singkat ?: ($m->judul ?: 'Dokumentasi kegiatan lapangan YALI Papua.');
                    @endphp
                    <div id="foto-item-{{ $index + 1 }}" data-foto-item class="scroll-mt-32 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="relative overflow-hidden bg-gray-100" style="aspect-ratio: 1720 / 1080;">
                            @if ($m->tipe === 'video')
                                <img src="https://img.youtube.com/vi/{{ $m->file_name }}/hqdefault.jpg"
                                    class="w-full h-full object-cover"
                                    alt="{{ $galeri->judul }} - Video {{ $index + 1 }}"
                                    onerror="this.onerror=null;this.src='https://placehold.co/1720x1080'">
                                <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                                    <span class="bg-red-600/90 text-white rounded-full w-14 h-14 flex items-center justify-center shadow-lg">
                                        <i class="fa-solid fa-play text-xl ml-1"></i>
                                    </span>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $m->file_path) }}"
                                    class="w-full h-full object-cover"
                                    alt="{{ $galeri->judul }} - Foto {{ $index + 1 }}"
                                    onerror="this.onerror=null;this.src='https://placehold.co/1720x1080'">
                            @endif
                            <div class="absolute top-4 left-4 bg-black/40 backdrop-blur-sm text-white text-xs px-3 py-1.5 rounded-full font-semibold">
                                Item {{ $index + 1 }} / {{ $totalCount }}
                            </div>
                        </div>
                        <div class="p-6 sm:p-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $itemJudul }}</h3>
                            <div class="prose tinymce-content max-w-none text-gray-600 leading-relaxed">
                                {!! $itemKeterangan !!}
                            </div>
                            @if ($m->tipe === 'video')
                                <a href="{{ 'https://www.youtube.com/watch?v=' . $m->file_name }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center mt-4 text-sm font-semibold text-red-600 hover:text-red-700 transition">
                                    <i class="fa-brands fa-youtube mr-2"></i>Tonton di YouTube
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16 text-gray-400 bg-white rounded-2xl border border-gray-100">
                        <i class="fa-solid fa-images text-5xl mb-4 block"></i>
                        <p class="text-lg">Belum ada media di album ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-gray-700"><i class="fa-solid fa-share-nodes mr-1"></i> Bagikan:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('foto-bercerita.detail', $galeri->slug)) }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-blue-600 hover:bg-blue-700 text-white rounded-lg flex items-center justify-center transition text-sm">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('foto-bercerita.detail', $galeri->slug)) }}&text={{ urlencode($galeri->judul) }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-black hover:bg-gray-800 text-white rounded-lg flex items-center justify-center transition text-sm">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($galeri->judul . ' - ' . route('foto-bercerita.detail', $galeri->slug)) }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-green-600 hover:bg-green-700 text-white rounded-lg flex items-center justify-center transition text-sm">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
                <a href="{{ route('foto-bercerita') }}" class="inline-flex items-center px-6 py-2.5 border-2 border-primary-600 text-primary-600 font-semibold rounded-full hover:bg-primary-600 hover:text-white transition text-sm">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Foto Bercerita
                </a>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = Array.from(document.querySelectorAll('[data-foto-nav-link]'));
            const mediaItems = Array.from(document.querySelectorAll('[data-foto-item]'));

            if (!navLinks.length || !mediaItems.length) return;

            let activeItemId = mediaItems[0].id;
            const visibilityRatio = new Map(mediaItems.map((item) => [item.id, 0]));

            const setActiveNav = (itemId) => {
                navLinks.forEach((link) => {
                    const isActive = link.dataset.target === itemId;

                    link.classList.toggle('bg-primary-600', isActive);
                    link.classList.toggle('text-white', isActive);
                    link.classList.toggle('border-primary-600', isActive);
                    link.classList.toggle('shadow-md', isActive);

                    link.classList.toggle('bg-white', !isActive);
                    link.classList.toggle('text-primary-700', !isActive);
                    link.classList.toggle('border-primary-200', !isActive);

                    link.setAttribute('aria-current', isActive ? 'true' : 'false');
                });
            };

            const updateActiveFromViewport = () => {
                let bestId = activeItemId;
                let bestRatio = -1;

                visibilityRatio.forEach((ratio, itemId) => {
                    if (ratio > bestRatio) {
                        bestRatio = ratio;
                        bestId = itemId;
                    }
                });

                if (bestRatio <= 0) {
                    const triggerLine = window.innerHeight * 0.35;
                    let minDistance = Number.POSITIVE_INFINITY;

                    mediaItems.forEach((item) => {
                        const rect = item.getBoundingClientRect();
                        if (rect.bottom < 0 || rect.top > window.innerHeight) return;

                        const distance = Math.abs(rect.top - triggerLine);
                        if (distance < minDistance) {
                            minDistance = distance;
                            bestId = item.id;
                        }
                    });
                }

                if (bestId !== activeItemId) {
                    activeItemId = bestId;
                    setActiveNav(activeItemId);
                }
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    visibilityRatio.set(entry.target.id, entry.intersectionRatio);
                });
                updateActiveFromViewport();
            }, {
                threshold: [0, 0.2, 0.4, 0.6, 0.8, 1],
                rootMargin: '-12% 0px -55% 0px'
            });

            mediaItems.forEach((item) => observer.observe(item));

            navLinks.forEach((link) => {
                link.addEventListener('click', () => {
                    const target = link.dataset.target;
                    if (!target) return;
                    activeItemId = target;
                    setActiveNav(activeItemId);
                });
            });

            setActiveNav(activeItemId);
        });
    </script>
@endsection
