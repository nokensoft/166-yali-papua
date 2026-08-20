@extends('layouts.visitor')
@section('title', ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', ($situs['seo_meta_description'] ?? 'YALI Papua adalah yayasan lingkungan hidup yang berdedikasi untuk pelestarian alam dan pemberdayaan masyarakat adat di tanah Papua.'))

@section('json-ld')
@php
$_bcHome = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => route('beranda')],
]];
$_f = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
@endphp
<script type="application/ld+json">{!! json_encode($_bcHome, $_f) !!}</script>
@endsection

@section('content')

{{-- HERO (Template Modifikasi) --}}
<section id="beranda" class="relative min-h-[95vh] flex items-center overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('img/hero1.png') }}');">
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-white">
                <span class="inline-block px-4 py-1.5 bg-white/15 backdrop-blur-sm rounded-full text-sm font-medium mb-6 border border-white/20">
                    <i class="fa-solid fa-seedling mr-1"></i> Menjaga Alam Papua
                </span>
                <h1 class="text-4xl sm:text-8xl lg:text-9xl font-extrabold leading-tight mb-6 drop-shadow-md">
                    YALI Papua
                </h1>
                <p class="text-lg text-gray-50 mb-8 max-w-lg leading-relaxed drop-shadow-sm">
                    {{ $situs['deskripsi_situs'] ?? 'YALI Papua berdedikasi untuk pelestarian lingkungan hidup dan pemberdayaan masyarakat adat di tanah Papua.' }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('profil') }}" class="inline-flex items-center px-8 py-3.5 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 transition shadow-xl">
                        Tentang Kami <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                    <a href="{{ route('program') }}" class="inline-flex items-center px-8 py-3.5 bg-white/20 backdrop-blur-md border border-white/30 text-white font-bold rounded-full hover:bg-white hover:text-emerald-800 transition">
                        <i class="fa-solid fa-heart mr-2"></i> Yang Kami Lakukan
                    </a>
                </div>
            </div>
            {{-- Bagian kanan kosong (sudah diganti teks mengambang) --}}
            <div></div>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L48 105C96 90 192 60 288 50C384 40 480 50 576 55C672 60 768 60 864 55C960 50 1056 40 1152 45C1248 50 1344 70 1392 80L1440 90V120H0Z" fill="white"/>
        </svg>
    </div>
</section>


    {{-- BLOG TERBARU --}}
    <section id="blog" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-5xl sm:text-6xl font-extrabold text-gray-900 mb-4">Postingan Terbaru</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Berbagai tulisan, artikel, dan publikasi kegiatan berkaitan dari media YALI Papua.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($blogTerbaru as $b)
                    <article class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <a href="{{ route('blog.detail', $b->slug) }}" class="block">
                            <div class="relative overflow-hidden bg-gray-100" style="aspect-ratio: 1720 / 1080;">
                                <img src="{{ $b->gambar }}" alt="{{ $b->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.onerror=null;this.src='https://placehold.co/1720x1080'">
                            </div>
                        </a>
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-xs px-2.5 py-0.5 bg-emerald-50 text-emerald-700 rounded-full font-semibold">
                                    {{ $b->kategori->nama ?? 'Blog' }}
                                </span>
                            </div>
                            <a href="{{ route('blog.detail', $b->slug) }}">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-emerald-700 transition line-clamp-2">{{ $b->judul }}</h3>
                            </a>
                            <p class="text-sm text-gray-500 mb-4 line-clamp-3">
                                {{ \Illuminate\Support\Str::limit(strip_tags($b->ringkasan ?: $b->konten), 130) }}
                            </p>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-10 text-gray-400">
                        Belum ada blog.
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('blog') }}" class="inline-flex items-center px-6 py-3 border-2 border-emerald-600 text-emerald-600 font-semibold rounded-full hover:bg-emerald-600 hover:text-white transition">
                    Lihat Semua Blog <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- FOTO BERCERITA --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-5xl sm:text-6xl font-extrabold text-gray-900 mb-4">Foto Bercerita</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Kisah visual dari lapangan — dokumentasi perjalanan, aksi, dan dampak pelestarian lingkungan di Papua.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($fotoBerceritaTerbaru->take(4) as $album)
                    @php
                        $cover = $album->coverMedia ?: $album->media->first();
                        if ($cover && ($cover->tipe ?? '') === 'video') {
                            $coverUrl = 'https://img.youtube.com/vi/' . $cover->file_name . '/hqdefault.jpg';
                        } elseif ($cover) {
                            $coverUrl = asset('storage/' . $cover->file_path);
                        } else {
                            $coverUrl = 'https://placehold.co/1720x1080';
                        }
                    @endphp
                    <a href="{{ route('foto-bercerita.detail', $album->slug) }}" class="group block bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        <div class="relative overflow-hidden bg-gray-100" style="aspect-ratio: 1720 / 1080;">
                            <img src="{{ $coverUrl }}" alt="{{ $album->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.onerror=null;this.src='https://placehold.co/1720x1080'">
                            <div class="absolute bottom-3 right-3 bg-black/40 backdrop-blur-sm text-white text-xs px-2.5 py-1 rounded-full">
                                <i class="fa-solid fa-images mr-1"></i> {{ $album->media->count() }} Foto
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 group-hover:text-emerald-700 transition line-clamp-2">{{ $album->judul }}</h3>
                            <p class="text-xs text-gray-500 mt-2 line-clamp-2">{{ \Illuminate\Support\Str::limit(strip_tags($album->deskripsi ?: 'Dokumentasi kegiatan YALI Papua.'), 100) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-10 text-gray-400">
                        Belum ada album foto bercerita.
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('foto-bercerita') }}" class="inline-flex items-center px-6 py-3 border-2 border-sky-600 text-sky-600 font-semibold rounded-full hover:bg-sky-600 hover:text-white transition">
                    Lihat Semua Album <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- SEKILAS TENTANG KAMI --}}
    <section id="tentang" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="inline-block px-4 py-1 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-4">
                        <i class="fa-solid fa-users mr-1"></i> Tentang Kami
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">
                        Sekilas Tentang <span class="text-emerald-700">YALI Papua</span>
                    </h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        <strong>Yayasan Lingkungan Hidup Papua (YALI Papua)</strong> adalah organisasi nirlaba yang bergerak pada pelestarian lingkungan hidup serta pemberdayaan masyarakat adat di tanah Papua.
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Kami bekerja bersama masyarakat adat, pemerintah daerah, dan berbagai mitra untuk advokasi lingkungan, pendampingan masyarakat, serta pembangunan berkelanjutan.
                    </p>

                    <div class="grid sm:grid-cols-2 gap-4 mb-8">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-eye text-emerald-700"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Visi</h4>
                                <p class="text-xs text-gray-500">Terwujudnya kelestarian alam Papua yang berdaulat dan berkelanjutan.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-sky-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fa-solid fa-bullseye text-sky-700"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Misi</h4>
                                <p class="text-xs text-gray-500">Advokasi, edukasi, dan pemberdayaan masyarakat adat Papua.</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('profil') }}" class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white font-semibold rounded-full hover:bg-emerald-700 transition shadow-md">
                        Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="relative">
                    <div class="bg-white rounded-2xl shadow-lg">
                        <img src="{{ asset('img/yali-papua-ilustrasi-logo.jpg') }}" class="w-full" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PROGRAM UNGGULAN --}}
    <section id="program" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="inline-block px-4 py-1 bg-sky-100 text-sky-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fa-solid fa-hand-holding-heart mr-1"></i> Yang Kami Lakukan
                </span>
                <h2 class="text-5xl sm:text-6xl font-extrabold text-gray-900 mb-4">Program Unggulan</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Berbagai program strategis untuk menjaga kelestarian alam dan memberdayakan masyarakat adat Papua.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300 bg-white hover:-translate-y-1 text-center">
                    <div class="bg-emerald-100 text-emerald-700 w-14 h-14 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform mx-auto">
                        <i class="fa-solid fa-tree text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pelestarian Hutan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Pemetaan partisipatif dan pendampingan masyarakat adat dalam menjaga hutan adat dari ancaman deforestasi.</p>
                </div>
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300 bg-white hover:-translate-y-1 text-center">
                    <div class="bg-sky-100 text-sky-700 w-14 h-14 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform mx-auto">
                        <i class="fa-solid fa-fish text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Konservasi Laut</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Pelindungan ekosistem pesisir dan laut, termasuk terumbu karang, mangrove, dan biota laut Papua.</p>
                </div>
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300 bg-white hover:-translate-y-1 text-center">
                    <div class="bg-emerald-100 text-emerald-700 w-14 h-14 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform mx-auto">
                        <i class="fa-solid fa-graduation-cap text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Edukasi Lingkungan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Program pendidikan lingkungan untuk membangun kesadaran generasi muda Papua.</p>
                </div>
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300 bg-white hover:-translate-y-1 text-center">
                    <div class="bg-sky-100 text-sky-700 w-14 h-14 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform mx-auto">
                        <i class="fa-solid fa-people-group text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pemberdayaan Masyarakat</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Pendampingan masyarakat adat dalam pengelolaan sumber daya alam secara berkelanjutan.</p>
                </div>
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300 bg-white hover:-translate-y-1 text-center">
                    <div class="bg-emerald-100 text-emerald-700 w-14 h-14 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform mx-auto">
                        <i class="fa-solid fa-scale-balanced text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Advokasi Kebijakan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Mendorong kebijakan pro-lingkungan dan hak masyarakat adat melalui advokasi berbasis data.</p>
                </div>
                <div class="group p-8 rounded-2xl border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300 bg-white hover:-translate-y-1 text-center">
                    <div class="bg-sky-100 text-sky-700 w-14 h-14 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform mx-auto">
                        <i class="fa-solid fa-solar-panel text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Energi Terbarukan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Inisiasi pemanfaatan energi terbarukan di kampung-kampung untuk mendukung pembangunan berkelanjutan.</p>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('program') }}" class="inline-flex items-center px-6 py-3 border-2 border-emerald-600 text-emerald-600 font-semibold rounded-full hover:bg-emerald-600 hover:text-white transition">
                    Lihat Semua Program <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- INFO GRAFIS 
    <section class="py-20 bg-gradient-to-br from-emerald-800 via-emerald-900 to-sky-900 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 right-10 w-64 h-64 bg-sky-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-80 h-80 bg-emerald-400 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="inline-block px-4 py-1 bg-white/15 backdrop-blur-sm rounded-full text-sm font-medium mb-4 border border-white/20">
                    <i class="fa-solid fa-chart-pie mr-1"></i> Info Grafis
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">Papua Dalam Angka</h2>
                <p class="text-gray-300 max-w-2xl mx-auto">Fakta dan data penting tentang kekayaan alam Papua yang harus kita jaga bersama.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/10 hover:bg-white/15 transition">
                    <i class="fa-solid fa-tree text-4xl text-emerald-200 mb-4"></i>
                    <div class="text-4xl font-extrabold mb-2">34,4</div>
                    <div class="text-sm font-semibold text-emerald-200">Juta Hektar</div>
                    <p class="text-xs text-gray-200 mt-2">Luas hutan Papua, salah satu yang terbesar di dunia.</p>
                </div>
                <div class="text-center p-6 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/10 hover:bg-white/15 transition">
                    <i class="fa-solid fa-fish text-4xl text-sky-200 mb-4"></i>
                    <div class="text-4xl font-extrabold mb-2">1.800+</div>
                    <div class="text-sm font-semibold text-sky-200">Spesies Ikan</div>
                    <p class="text-xs text-gray-200 mt-2">Keanekaragaman hayati laut tertinggi di dunia.</p>
                </div>
                <div class="text-center p-6 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/10 hover:bg-white/15 transition">
                    <i class="fa-solid fa-dove text-4xl text-emerald-200 mb-4"></i>
                    <div class="text-4xl font-extrabold mb-2">600+</div>
                    <div class="text-sm font-semibold text-emerald-200">Spesies Burung</div>
                    <p class="text-xs text-gray-200 mt-2">Termasuk Cenderawasih, burung surga endemik Papua.</p>
                </div>
                <div class="text-center p-6 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/10 hover:bg-white/15 transition">
                    <i class="fa-solid fa-people-group text-4xl text-sky-200 mb-4"></i>
                    <div class="text-4xl font-extrabold mb-2">250+</div>
                    <div class="text-sm font-semibold text-sky-200">Suku Asli</div>
                    <p class="text-xs text-gray-200 mt-2">Kekayaan budaya dan kearifan lokal yang unik.</p>
                </div>
            </div>
        </div>
    </section>
    --}}

    {{-- CTA BERMITRA --}}
    <section id="mitra" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="grid lg:grid-cols-2">
                    <div class="p-10 lg:p-16 flex flex-col justify-center">
                        <span class="inline-block px-4 py-1 bg-sky-100 text-sky-700 rounded-full text-sm font-semibold mb-4 w-fit">
                            <i class="fa-solid fa-handshake mr-1"></i> Bermitra
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">
                            Mari Bermitra untuk <span class="text-emerald-700">Papua</span> yang Lebih Baik
                        </h2>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Kami membuka peluang kemitraan dengan organisasi, perusahaan, institusi pendidikan, dan individu yang peduli pada pelestarian lingkungan serta pemberdayaan masyarakat adat Papua.
                        </p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-circle-check text-emerald-600"></i> Kemitraan program dan proyek bersama</li>
                            <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-circle-check text-emerald-600"></i> Dukungan pendanaan dan sumber daya</li>
                            <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-circle-check text-emerald-600"></i> Kolaborasi riset dan publikasi</li>
                            <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-circle-check text-emerald-600"></i> Volunteer dan tenaga ahli</li>
                        </ul>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('kontak') }}" class="inline-flex items-center px-8 py-3.5 bg-emerald-600 text-white font-bold rounded-full hover:bg-emerald-700 transition shadow-md hover:shadow-lg">
                                Hubungi Kami <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>
                            <a href="{{ route('mitra') }}" class="inline-flex items-center px-8 py-3.5 border-2 border-gray-300 text-gray-700 font-bold rounded-full hover:border-emerald-600 hover:text-emerald-600 transition">
                                Lihat Halaman Mitra
                            </a>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-600 to-sky-700 p-10 lg:p-16 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h3 class="text-2xl font-bold mb-3">Mitra Kami</h3>
                            <p class="text-sm text-gray-200 mb-8">Organisasi yang telah bermitra dengan YALI Papua</p>
                            <div class="bg-white rounded-2xl p-6">
                                <img src="{{ asset('img/mitra/David and Lucile Packard Foundation.png') }}" alt="The David and Lucile Packard Foundation" class="h-24 w-auto mx-auto">
                            </div>
                            <p class="text-sm text-gray-200 mt-4">The David &amp; Lucile Packard Foundation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CENDERA MATA --}}
    <section id="cendera-mata" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                {{-- <span class="inline-block px-4 py-1 bg-sky-100 text-sky-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fa-solid fa-gift mr-1"></i> Cendera Mata
                </span> --}}
                {{-- <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">Cendera Mata YALI Papua</h2> --}}
                <p class="text-gray-500 max-w-2xl mx-auto">Produk dan cenderamata YALI Papua. Setiap pembelian ikut mendukung program pelestarian lingkungan.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-[4/5] overflow-hidden"><img src="{{ asset('img/merchandise/mockup-tshirst-yali-papua2.png') }}" alt="Kaos YALI Papua" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"></div>
                    <div class="p-5 text-center">
                        <h3 class="font-bold text-gray-900 mb-1">Kaos YALI Papua</h3>
                        {{-- <p class="text-xs text-gray-500 mb-3">Kaos katun premium dengan logo YALI Papua</p> --}}
                        <a href="{{ route('kontak') }}" class="inline-flex items-center px-5 py-2 bg-emerald-600 text-white text-sm font-semibold rounded-full hover:bg-emerald-700 transition"><i class="fa-solid fa-envelope mr-1"></i> Pesan</a>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-[4/5] overflow-hidden"><img src="{{ asset('img/merchandise/mockup-jacket-yali-papua.png') }}" alt="Kaos YALI Papua" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"></div>
                    <div class="p-5 text-center">
                        <h3 class="font-bold text-gray-900 mb-1">Jacket YALI Papua</h3>
                        {{-- <p class="text-xs text-gray-500 mb-3">Jaket premium dengan logo YALI Papua</p> --}}
                        <a href="{{ route('kontak') }}" class="inline-flex items-center px-5 py-2 bg-emerald-600 text-white text-sm font-semibold rounded-full hover:bg-emerald-700 transition"><i class="fa-solid fa-envelope mr-1"></i> Pesan</a>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-[4/5] overflow-hidden"><img src="{{ asset('img/merchandise/mockup-tas-putih-yali-papua2.png') }}" alt="Tote Bag YALI Papua" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"></div>
                    <div class="p-5 text-center">
                        <h3 class="font-bold text-gray-900 mb-1">Tote Bag YALI Papua</h3>
                        {{-- <p class="text-xs text-gray-500 mb-3">Tote bag kanvas ramah lingkungan</p> --}}
                        <a href="{{ route('kontak') }}" class="inline-flex items-center px-5 py-2 bg-emerald-600 text-white text-sm font-semibold rounded-full hover:bg-emerald-700 transition"><i class="fa-solid fa-envelope mr-1"></i> Pesan</a>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-[4/5] overflow-hidden"><img src="{{ asset('img/merchandise/mockup-gelas-yali-papua2.png') }}" alt="Gelas Mug YALI Papua" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"></div>
                    <div class="p-5 text-center">
                        <h3 class="font-bold text-gray-900 mb-1">Gelas Mug YALI Papua</h3>
                        {{-- <p class="text-xs text-gray-500 mb-3">Mug keramik dengan logo YALI Papua</p> --}}
                        <a href="{{ route('kontak') }}" class="inline-flex items-center px-5 py-2 bg-emerald-600 text-white text-sm font-semibold rounded-full hover:bg-emerald-700 transition"><i class="fa-solid fa-envelope mr-1"></i> Pesan</a>
                    </div>
                </div>
                <div class="group bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-[4/5] overflow-hidden"><img src="{{ asset('img/merchandise/mockup-topi-bucket-yali-papua2.png') }}" alt="Topi Bucket YALI Papua" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"></div>
                    <div class="p-5 text-center">
                        <h3 class="font-bold text-gray-900 mb-1">Topi Bucket YALI Papua</h3>
                        {{-- <p class="text-xs text-gray-500 mb-3">Topi bucket untuk kegiatan outdoor</p> --}}
                        <a href="{{ route('kontak') }}" class="inline-flex items-center px-5 py-2 bg-emerald-600 text-white text-sm font-semibold rounded-full hover:bg-emerald-700 transition"><i class="fa-solid fa-envelope mr-1"></i> Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
