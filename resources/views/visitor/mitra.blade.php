@extends('layouts.visitor')
@section('title', 'Mitra Kerja - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Mitra Kerja & Sponsor YALI Papua')
@section('seo-description', $halaman->keterangan ?? 'Daftar 49 jaringan mitra kerja YALI Papua dalam skala lokal, nasional, dan internasional.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Tentang','item'=>route('profil')],['@type'=>'ListItem','position'=>3,'name'=>'Mitra Kerja']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@php
$mitraData = [
    'pemerintah' => [
        'label'      => 'Pemerintah',
        'icon'       => 'fa-landmark',
        'badge'      => 'bg-blue-50 text-blue-700',
        'mitra' => [
            [1,  'Menteri Kehutanan',  '',  'https://www.kehutanan.go.id/'],
            [2,  'Kabupaten Jayapura', '',  'jayapurakab.go.id'],
            [3,  'Kabupaten Mappi',    '',  'https://mappikab.go.id/'],
            [4,  'Kabupaten Sarmi',    '',  'https://www.sarmikab.go.id'],
        ],
    ],
    'adat' => [
        'label'      => 'Adat & Komunitas',
        'icon'       => 'fa-users',
        'badge'      => 'bg-amber-50 text-amber-700',
        'mitra' => [
            [5,  'Dewan Adat Suku di Kabupaten Jayapura', 'Ada 9 dewan adat suku di Kab. Jayapura', ''],
            [6,  'Dewan Adat Suku di Kabupaten Sarmi',    'Ada 5 suku besar di Kabupaten Sarmi',    ''],
            [7,  'Ikatan Perempuan Mappi',                '',                                        ''],
            [8,  'Organisasi Perempuan Adat Namblong',    'ORPA Namblong',                           ''],
            [9,  'LMA Kabupaten Mappi',                   'Lembaga Masyarakat Adat Kab. Mappi',      ''],
            [10, 'LMA Kabupaten Sarmi',                   'Lembaga Masyarakat Adat Kab. Sarmi',      ''],
        ],
    ],
    'ngo_lokal' => [
        'label'      => 'NGO Lokal Papua',
        'icon'       => 'fa-hand-holding-heart',
        'badge'      => 'bg-green-50 text-green-700',
        'mitra' => [
            [11, 'KIPRa Papua',        'Yayasan Konsultasi Independen Pemberdayaan Masyarakat Papua', 'https://www.instagram.com/kipra_papua/'],
            [12, 'JERAT Papua',        'Jaringan Kerja Rakyat Papua',                                'https://www.jeratpapua.org/'],
            [13, 'WALHI Papua',        'Wahana Lingkungan Hidup Papua',                              'https://www.instagram.com/walhi_papua/'],
            [14, 'FOKER Papua',        'Forum Kerjasama LSM Papua',                                  'https://www.tanahpapua.org/'],
            [15, 'YALI Papua',         'Yayasan Lingkungan Hidup Papua',                             'https://yalipapua.org/'],
            [16, 'INTSIA Papua',       '',                                                            'intsiapapua.org'],
            [17, 'LEKAT',              'Lembaga Pengkajian dan Pemberdayaan Masyarakat Adat',         'https://lekatpapua.org/'],
            [18, 'RUMSRAM',            '',                                                            'rumsram.org'],
            [19, 'YPMD Papua',         'Yayasan Pengembangan Masyarakat Desa Papua',                 'ypmdpapua.or.id'],
            [20, 'WWF Regional Papua', 'World Wide Fund for Nature Regional Papua',                   'wwf.id'],
            [21, 'KIPAS',              'Komunitas Masyarakat Peduli Alam dan Lingkungan',             ''],
            [22, 'YWSS',               'Yayasan Wahana Sejahtera Sorong',                            ''],
        ],
    ],
    'ngo_nasional' => [
        'label'      => 'NGO Nasional',
        'icon'       => 'fa-globe',
        'badge'      => 'bg-purple-50 text-purple-700',
        'mitra' => [
            [23, 'JKPP',                         'Jaringan Kerja Pemetaan Partisipatif',                   'https://jkpp.org/'],
            [24, 'BRWA',                         'Badan Registrasi Wilayah Adat',                          'brwa.or.id'],
            [25, 'KEMITRAAN Indonesia',           '',                                                       'kemitraan.or.id'],
            [26, 'HUMA',                         'Perkumpulan untuk Pembaharuan Hukum Berbasis Masyarakat', 'huma.or.id'],
            [27, 'The Samdhana Institute',        '',                                                       'samdhana.org'],
            [28, 'LP3AP',                        'Lembaga Pengkajian Pemberdayaan Perempuan & Anak Papua',  ''],
            [29, 'YAPPIKA',                      '',                                                       'yappika-actionaid.or.id'],
            [30, 'LINGKAR MADANI',               'Lingkar Madani Indonesia',                               'lingkarmadani.org'],
            [31, 'PATTIRO',                      'Pusat Telaah dan Informasi Regional',                    'pattiro.org'],
            [32, 'PERNIK',                       'Perkumpulan untuk Pemberdayaan dan Pendidikan',          ''],
            [33, 'PUSAKA',                       'Yayasan Pusaka Bentala Rakyat',                          'pusaka.or.id'],
            [34, 'WALHI Nasional',               'Wahana Lingkungan Hidup Indonesia',                      'walhi.or.id'],
            [35, 'TLE',                          'The Local Enablers',                                     'thelocalenablers.id'],
            [36, 'Greenpeace Indonesia',          '',                                                       'greenpeace.org/indonesia'],
            [37, 'EcoNusa',                      'Yayasan Ekosistem Nusantara Berkelanjutan',              'econusa.id'],
            [38, 'YADUPA',                       'Yayasan Pendidikan Kebudayaan Papua',                    'yadupa.org'],
            [39, 'Dewan Adat TABI',              '',                                                       ''],
            [40, 'Dewan Adat Papua',             '',                                                       'dewanadatpapua.org'],
            [41, 'Solidaritas Perempuan Adat Papua', 'SPP',                                               '@solidaritasperempuan'],
            [42, 'JUBI',                         '',                                                       'jubi.id'],
            [43, 'Yayasan SATUNAMA',             'Yogyakarta',                                             'satunama.org'],
            [44, 'SKALA',                        'Sinergi Kapasitas Lintas Organisasi',                    'skala.or.id'],
            [45, 'WGGI',                         'Working Group on Forest Tenures',                        'wggt.or.id'],
            [46, 'AMAN',                         'Aliansi Masyarakat Adat Nusantara',                     'aman.or.id'],
            [47, 'PUTER',                        'Yayasan Puter Indonesia',                                'puter.or.id'],
            [48, 'KPA',                          'Konsorsium Pembaruan Agraria',                           'kpa.or.id'],
            [49, 'PENABULU',                     'Yayasan Penabulu',                                       'penabulu.id'],
        ],
    ],
];
@endphp

@section('content')
    @include('partials.page-banner', [
        'title' => 'Jaringan Mitra',
        'breadcrumb' => '<a href="' . route('profil') . '" class="hover:text-white transition">Tentang</a> <i class="fa-solid fa-chevron-right text-xs mx-1"></i> Mitra Kerja',
    ])

    {{-- Stats Bar --}}
    <div class="bg-white border-b border-neutral-100 py-6">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="text-center">
                    <p class="text-3xl font-black text-secondary">49</p>
                    <p class="text-sm font-semibold uppercase tracking-wider text-neutral-500 mt-0.5">Total Mitra</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-black text-blue-600">4</p>
                    <p class="text-sm font-semibold uppercase tracking-wider text-neutral-500 mt-0.5">Pemerintah</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-black text-green-600">12</p>
                    <p class="text-sm font-semibold uppercase tracking-wider text-neutral-500 mt-0.5">NGO Lokal</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl font-black text-purple-600">27</p>
                    <p class="text-sm font-semibold uppercase tracking-wider text-neutral-500 mt-0.5">NGO Nasional</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Accordion + Tab Sidebar --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col-reverse lg:flex-row gap-8 items-start"
                 x-data="{
                     active: 'semua',
                     open: { pemerintah: true, adat: true, ngo_lokal: true, ngo_nasional: true },
                     setTab(cat) {
                         this.active = cat;
                         if (cat === 'semua') {
                             Object.keys(this.open).forEach(k => this.open[k] = true);
                         } else {
                             Object.keys(this.open).forEach(k => this.open[k] = (k === cat));
                         }
                     }
                 }">

                {{-- Kiri: Accordion --}}
                <div class="flex-1 min-w-0 space-y-3">

                    @foreach ($mitraData as $key => $cat)
                    <div class="rounded-lg border border-neutral-200 overflow-hidden fade-in"
                         x-show="active === 'semua' || active === '{{ $key }}'"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0">

                        {{-- Header Accordion --}}
                        <button type="button"
                                @click="open['{{ $key }}'] = !open['{{ $key }}']"
                                class="w-full flex items-center justify-between px-5 py-4 bg-neutral-50 hover:bg-neutral-100 transition text-left">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-secondary/10 text-secondary flex items-center justify-center rounded-lg shrink-0">
                                    <i class="fa-solid {{ $cat['icon'] }} text-base"></i>
                                </div>
                                <div>
                                    <span class="font-display font-bold text-neutral-900 text-lg">{{ $cat['label'] }}</span>
                                    <span class="ml-2 text-sm text-neutral-400 font-normal">{{ count($cat['mitra']) }} organisasi</span>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-down text-neutral-400 text-sm transition-transform duration-200 shrink-0"
                               :class="open['{{ $key }}'] ? 'rotate-180' : ''"></i>
                        </button>

                        {{-- Konten Accordion --}}
                        <div x-show="open['{{ $key }}']"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100">
                            <div class="p-5 grid sm:grid-cols-2 xl:grid-cols-3 gap-3">
                                @foreach ($cat['mitra'] as [$no, $nama, $fn, $web])
                                <div class="rounded-lg bg-white border border-neutral-100 p-4 hover:border-secondary/40 hover:shadow-card transition">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs font-mono text-neutral-300">#{{ sprintf('%02d', $no) }}</span>
                                        <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full {{ $cat['badge'] }}">
                                            {{ Str::words($cat['label'], 1, '') }}
                                        </span>
                                    </div>
                                    <h4 class="font-display font-bold text-neutral-900 text-base leading-tight">{{ $nama }}</h4>
                                    @if($fn)
                                        <p class="text-neutral-500 text-sm mt-0.5">{{ $fn }}</p>
                                    @endif
                                    @if($web)
                                        @php
                                            $isIg = str_starts_with($web, '@');
                                            $url  = $isIg ? 'https://www.instagram.com/'.ltrim($web,'@') : (str_starts_with($web,'http') ? $web : 'https://'.$web);
                                            $lbl  = $isIg ? $web : rtrim(preg_replace('#^https?://(www\.)?#','',$url),'/');
                                        @endphp
                                        <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                                           class="inline-flex items-center gap-1 text-secondary text-sm hover:underline mt-1.5">
                                            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i> {{ $lbl }}
                                        </a>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                {{-- Kanan: Tab Sidebar --}}
                <div class="w-full lg:w-56 shrink-0">
                    <div class="sticky top-24 rounded-lg border border-neutral-200 overflow-hidden">
                        <div class="bg-neutral-50 px-4 py-3 border-b border-neutral-200">
                            <p class="text-xs font-bold uppercase tracking-widest text-neutral-500">Filter Kategori</p>
                        </div>
                        <nav class="divide-y divide-neutral-100">

                            {{-- Semua --}}
                            <button type="button" @click="setTab('semua')"
                                    :class="active === 'semua' ? 'bg-secondary text-white' : 'bg-white text-neutral-700 hover:bg-neutral-50'"
                                    class="w-full flex items-center justify-between px-4 py-3 text-left transition">
                                <div class="flex items-center gap-2.5">
                                    <i class="fa-solid fa-border-all text-sm w-4 text-center"></i>
                                    <span class="text-sm font-semibold">Semua</span>
                                </div>
                                <span class="text-xs font-bold px-1.5 py-0.5 rounded"
                                      :class="active === 'semua' ? 'bg-white/20 text-white' : 'bg-neutral-100 text-neutral-500'">49</span>
                            </button>

                            @foreach ($mitraData as $key => $cat)
                            <button type="button" @click="setTab('{{ $key }}')"
                                    :class="active === '{{ $key }}' ? 'bg-secondary text-white' : 'bg-white text-neutral-700 hover:bg-neutral-50'"
                                    class="w-full flex items-center justify-between px-4 py-3 text-left transition">
                                <div class="flex items-center gap-2.5">
                                    <i class="fa-solid {{ $cat['icon'] }} text-sm w-4 text-center"></i>
                                    <span class="text-sm font-semibold">{{ $cat['label'] }}</span>
                                </div>
                                <span class="text-xs font-bold px-1.5 py-0.5 rounded"
                                      :class="active === '{{ $key }}' ? 'bg-white/20 text-white' : 'bg-neutral-100 text-neutral-500'">{{ count($cat['mitra']) }}</span>
                            </button>
                            @endforeach

                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
