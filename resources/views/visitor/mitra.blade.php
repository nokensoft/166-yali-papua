@extends('layouts.visitor')
@section('title', 'Mitra - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Mitra - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Bersama mitra, kami memperkuat gerakan pelestarian lingkungan dan pemberdayaan masyarakat adat Papua.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Mitra','item'=>route('mitra')]]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
<section class="relative bg-cover bg-center py-20 overflow-hidden" style="background-image: url('./img/hero5.jpg');">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
        <div class="text-center">
            <span class="inline-block px-4 py-1.5 bg-black/30 backdrop-blur-sm rounded-full text-sm font-medium mb-4 border border-white/20">
                <i class="fa-solid fa-handshake mr-1"></i> Kemitraan
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 drop-shadow-lg">Mitra Utama Kami</h1>
            <p class="text-gray-100 max-w-2xl mx-auto drop-shadow-md">Bersama mitra, kami memperkuat gerakan pelestarian lingkungan dan pemberdayaan masyarakat adat Papua.</p>
        </div>
        
        <div class="mt-10 max-w-5xl mx-auto bg-black/40 backdrop-blur-md border border-white/20 rounded-3xl p-6 sm:p-8 shadow-2xl">
            <div class="grid lg:grid-cols-[1.25fr_auto] gap-8 items-center">
                <div class="text-center lg:text-left">
                    <p class="text-white/80 uppercase tracking-[0.2em] text-xs font-semibold mb-3">Mitra Utama</p>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white mb-3">The David & Lucile Packard Foundation</h2>
                    <p class="text-gray-100 leading-relaxed">Mitra utama YALI Papua dalam mendukung inisiatif pelestarian lingkungan, penguatan masyarakat adat, dan pembangunan berkelanjutan di Papua.</p>
                </div>
                <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-xl">
                    <img src="{{ asset('img/mitra/David and Lucile Packard Foundation.png') }}" alt="The David & Lucile Packard Foundation" class="h-20 sm:h-24 w-auto mx-auto">
                </div>
            </div>
        </div>

        <nav class="mt-6 flex items-center justify-center gap-2 text-sm text-gray-100">
            <a href="{{ route('beranda') }}" class="hover:text-white transition drop-shadow-md">Beranda</a>
            <i class="fa-solid fa-chevron-right text-xs"></i>
            <span class="text-white font-semibold drop-shadow-md">Mitra</span>
        </nav>
    </div>
</section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">Kategori Mitra Lainnya</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Selain mitra utama, YALI Papua didukung jaringan mitra lainnya dalam berbagai kategori berikut.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6" x-data="{
                categories: [
                    { name:'Internasional', count:3, examples:'ICRAF, EU, CGIAR' },
                    { name:'Pemerintah/Nasional', count:3, examples:'PLCD-TF, Unibraw, BRG' },
                    { name:'LSM Lokal/Nasional', count:6, examples:'WALHI, FOKER, Jerat, Paradisea, YKPM, LBH' },
                    { name:'Koalisi Sipil', count:1, examples:'KO MASI' },
                    { name:'Akademik', count:1, examples:'USTJ' }
                ]
            }">
                <template x-for="(c, i) in categories" :key="i">
                    <div class="bg-gray-50 rounded-2xl border border-gray-100 p-6 hover:shadow-lg transition">
                        <div class="flex items-start justify-between gap-4 mb-3">
                            <h3 class="text-lg font-bold text-gray-900" x-text="c.name"></h3>
                            <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary-100 text-primary-700 text-xs font-bold whitespace-nowrap">
                                <span x-text="c.count"></span>&nbsp;Mitra
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 leading-relaxed" x-text="c.examples"></p>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="inline-block px-4 py-1 bg-secondary-100 text-secondary-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fa-solid fa-handshake mr-1"></i> Bermitra
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">Bentuk Kemitraan</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-primary-100 text-primary-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-diagram-project text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Program Bersama</h3>
                    <p class="text-sm text-gray-500">Kerjasama program dan proyek pelestarian lingkungan.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-secondary-100 text-secondary-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-coins text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Pendanaan</h3>
                    <p class="text-sm text-gray-500">Dukungan pendanaan dan sumber daya untuk program kami.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-primary-100 text-primary-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-flask text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Riset</h3>
                    <p class="text-sm text-gray-500">Kolaborasi riset dan publikasi ilmiah.</p>
                </div>
                <div class="bg-white rounded-2xl p-6 text-center border border-gray-100 hover:shadow-lg transition">
                    <div class="w-14 h-14 bg-secondary-100 text-secondary-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-user-group text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Volunteer</h3>
                    <p class="text-sm text-gray-500">Volunteer dan tenaga ahli untuk program lapangan.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-br from-primary-600 to-secondary-700 text-white text-center">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-4">Mari Bermitra untuk Papua</h2>
            <p class="text-gray-200 mb-8">Hubungi kami untuk mendiskusikan peluang kemitraan.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('kontak') }}" class="px-8 py-3.5 bg-white text-primary-700 font-bold rounded-full hover:bg-primary-50 transition shadow-xl">
                    <i class="fa-solid fa-envelope mr-2"></i>Hubungi Kami
                </a>
                <a href="{{ route('mitra') }}" class="px-8 py-3.5 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-primary-700 transition">
                    <i class="fa-solid fa-download mr-2"></i>Lihat Halaman Mitra
                </a>
            </div>
        </div>
    </section>
@endsection
