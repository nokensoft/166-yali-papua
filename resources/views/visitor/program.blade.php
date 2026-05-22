@extends('layouts.visitor')
@section('title', 'Yang Kami Lakukan - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Yang Kami Lakukan - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Program strategis pelestarian lingkungan dan pemberdayaan masyarakat adat Papua.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Yang Kami Lakukan','item'=>route('program')]]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    <section class="relative bg-gradient-to-br from-primary-800 via-primary-900 to-secondary-900 py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-secondary-400 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <span class="inline-block px-4 py-1.5 bg-white/15 backdrop-blur-sm rounded-full text-sm font-medium mb-4 border border-white/20">
                <i class="fa-solid fa-hand-holding-heart mr-1"></i> Program
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">Yang Kami Lakukan</h1>
            <p class="text-gray-300 max-w-2xl mx-auto">Program strategis pelestarian lingkungan dan pemberdayaan masyarakat adat Papua.</p>
            <nav class="mt-6 flex items-center justify-center gap-2 text-sm text-gray-300">
                <a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a>
                <i class="fa-solid fa-chevron-right text-xs"></i>
                <span class="text-white font-semibold">Yang Kami Lakukan</span>
            </nav>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-16" x-data="{
                programs: [
                    { icon:'fa-tree', color:'primary', title:'Pelestarian Hutan', image:'{{ asset('img/tentang/Pelestarian Hutan.jpeg') }}', detail:'Kami bekerja bersama masyarakat adat untuk memetakan wilayah hutan adat, membangun mekanisme pengawasan berbasis masyarakat, dan melakukan advokasi kebijakan perlindungan hutan. Program ini mencakup pelatihan pemetaan GPS, dokumentasi batas wilayah adat, dan pendampingan hukum.', stats:['120+ Kampung Terdampingi','500.000 Ha Hutan Terpetakan','30+ Peta Wilayah Adat'] },
                    { icon:'fa-fish', color:'secondary', title:'Konservasi Laut', image:'{{ asset('img/tentang/Konservasi Laut.jpeg') }}', detail:'Program konservasi laut kami meliputi pemantauan terumbu karang, restorasi mangrove, dan pemberdayaan nelayan untuk praktik penangkapan ikan berkelanjutan. Kami juga berkolaborasi dengan otoritas kawasan konservasi untuk pengelolaan MPA (Marine Protected Area).', stats:['15 Kawasan Konservasi','50.000 Bibit Mangrove','200+ Nelayan Terdampingi'] },
                    { icon:'fa-graduation-cap', color:'primary', title:'Edukasi Lingkungan', image:'{{ asset('img/tentang/Edukasi Lingkungan.jpeg') }}', detail:'Melalui program sekolah alam, workshop kampung, dan kampanye digital, kami membangun kesadaran lingkungan sejak dini. Program ini menjangkau siswa SD hingga perguruan tinggi di seluruh wilayah Papua.', stats:['50+ Sekolah Mitra','5.000+ Siswa Terjangkau','100+ Workshop'] },
                    { icon:'fa-people-group', color:'secondary', title:'Pemberdayaan Masyarakat', image:'{{ asset('img/tentang/Pemberdayaan Masyarakat.jpeg') }}', detail:'Kami mendampingi masyarakat adat mengembangkan ekonomi berbasis sumber daya alam lokal secara berkelanjutan, termasuk ekowisata, pertanian organik, dan pengolahan hasil hutan non-kayu.', stats:['80+ Kelompok Dampingan','30 Produk Lokal','1.500+ Peserta Pelatihan'] },
                    { icon:'fa-scale-balanced', color:'primary', title:'Advokasi Kebijakan', image:'{{ asset('img/tentang/Pelestarian Hutan.jpeg') }}', detail:'Kami melakukan riset kebijakan, mendampingi masyarakat dalam proses hukum, dan membangun dialog dengan pemerintah daerah dan pusat untuk mendorong kebijakan yang melindungi hak masyarakat adat dan kelestarian lingkungan.', stats:['25+ Dokumen Kebijakan','10 Kasus Advokasi','50+ Dialog Kebijakan'] },
                    { icon:'fa-solar-panel', color:'secondary', title:'Energi Terbarukan', image:'{{ asset('img/tentang/Edukasi Lingkungan.jpeg') }}', detail:'Program ini mengembangkan pembangkit listrik mikrohidro dan panel surya di kampung-kampung terpencil yang belum terjangkau jaringan listrik. Masyarakat dilatih untuk mengelola dan merawat instalasi secara mandiri.', stats:['15 Instalasi PLTMH','25 Sistem Panel Surya','3.000+ Penerima Manfaat'] }
                ]
            }">
                <template x-for="(p, i) in programs" :key="i">
                    <div class="grid lg:grid-cols-2 gap-10 items-center">
                        <div :class="i % 2 !== 0 ? 'lg:order-2' : ''">
                            <div :class="p.color==='primary' ? 'bg-primary-100 text-primary-700' : 'bg-secondary-100 text-secondary-700'" class="w-14 h-14 rounded-xl flex items-center justify-center mb-5">
                                <i :class="'fa-solid ' + p.icon + ' text-2xl'"></i>
                            </div>
                            <h3 class="text-2xl font-extrabold text-gray-900 mb-3" x-text="p.title"></h3>
                            <p class="text-gray-600 mb-4 leading-relaxed" x-text="p.detail"></p>
                            <div class="flex flex-wrap gap-3">
                                <template x-for="(s, j) in p.stats" :key="j">
                                    <span class="px-4 py-2 bg-gray-100 rounded-xl text-sm font-semibold text-gray-700" x-text="s"></span>
                                </template>
                            </div>
                        </div>
                        <div :class="i % 2 !== 0 ? 'lg:order-1' : ''" class="relative rounded-3xl overflow-hidden min-h-[280px] border border-gray-100 shadow-sm">
                            <img :src="p.image" :alt="p.title" class="w-full h-full object-cover absolute inset-0">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-black/5 to-transparent"></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
@endsection
