@extends('layouts.visitor')
@section('title', 'Struktur Kepengurusan - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Struktur Kepengurusan YALI Papua')
@section('seo-description', 'Struktur kepengurusan YALI Papua periode 2020–2025: Badan Pengawas, Badan Pengurus, dan Tim Pelaksana.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Tentang','item'=>route('profil')],['@type'=>'ListItem','position'=>3,'name'=>'Kepengurusan']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@php
$groups = [
    'pengawas' => [
        'label'   => 'Badan Pengawas',
        'sub'     => 'Supervisor',
        'icon'    => 'fa-user-shield',
        'badge'   => 'bg-sky-50 text-sky-700',
        'anggota' => [
            [1, 'Yoko Yahan Yaku',        'Anggota Pengawas', null],
            [2, 'Nicodemus Yance Wamafma','Anggota Pengawas', null],
            [3, 'Amos Soumilena',         'Anggota Pengawas', null],
        ],
    ],
    'pengurus' => [
        'label'   => 'Badan Pengurus',
        'sub'     => 'Board of Directors',
        'icon'    => 'fa-star',
        'badge'   => 'bg-secondary/10 text-secondary',
        'anggota' => [
            [1, 'Zadrak Wamebu',       'Ketua (Chairman)',                'L'],
            [2, 'Robert Mandosir',     'Wakil Ketua (Vice Chairman)',     'L'],
            [3, 'Naomi Marasian, SE',  'Sekretaris / Direktur Eksekutif','P'],
            [4, 'Dominggas Nari',      'Bendahara',                      'P'],
            [5, 'Ketrina Yabansabra',  'Anggota',                        'P'],
            [6, 'Johanes Wob',         'Anggota',                        'L'],
            [7, 'Frengky Saa',         'Anggota',                        'L'],
        ],
    ],
    'staff' => [
        'label'   => 'Tim Pelaksana',
        'sub'     => 'Staff',
        'icon'    => 'fa-people-group',
        'badge'   => 'bg-amber-50 text-amber-700',
        'anggota' => [
            [1,  'Naomi Marasian',      'Direktur Eksekutif',                    null],
            [2,  'Jacson Umbora',       'Program Officer Bidang PMA',            null],
            [3,  'Niko Wamafma',        'Program Officer Bidang KPP',            null],
            [4,  'Marselina Wamebu',    'Program Officer Bidang PPA',            null],
            [5,  'Daniel Bairam',       'Program Officer Bidang PEMA',           null],
            [6,  'Jahya Lorenz',        'Kabid Data, Media dan Informasi',       null],
            [7,  'Habel Samon',         'Office Manager / HRD',                  null],
            [8,  'Lince Ebe',           'Finance Manager',                       null],
            [9,  'Tantri Ninofur',      'Finance - Kasir',                       null],
            [10, 'Muscorry Kenakaimu',  'Field Staff di Mappi',                  null],
            [11, 'Obeth Farwas',        'Field Staff Pengembangan Ekonomi',      null],
            [12, 'Offni Sibetay',       'Staff Bidang Pemetaan / GIS',           null],
            [13, 'Benny Marani',        'Staff Kajian Sosbud dan Ekonomi',       null],
            [14, 'Helena Sarakan',      'Staff Perencanaan dan Pengembangan MA', null],
            [15, 'Noach Yanggu',        'Logistic & Driver',                     null],
        ],
    ],
];
$total = array_sum(array_map(fn($g) => count($g['anggota']), $groups));
@endphp

@section('content')
    {{-- Hero Banner --}}
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest">
                <a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> ›
                <a href="{{ route('profil') }}" class="hover:text-white">Tentang</a> › Kepengurusan
            </span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">Struktur Kepengurusan</h1>
            <p class="text-white/70 mt-2 text-lg">YALI Papua — Periode Kerja 2020–2025</p>
        </div>
    </div>

    {{-- Stats Bar --}}
    <div class="bg-white border-b border-neutral-100 py-6">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                <div>
                    <p class="text-3xl font-black text-secondary">{{ $total }}</p>
                    <p class="text-sm font-semibold uppercase tracking-wider text-neutral-500 mt-0.5">Total Personil</p>
                </div>
                <div>
                    <p class="text-3xl font-black text-sky-600">3</p>
                    <p class="text-sm font-semibold uppercase tracking-wider text-neutral-500 mt-0.5">Badan Pengawas</p>
                </div>
                <div>
                    <p class="text-3xl font-black text-secondary">7</p>
                    <p class="text-sm font-semibold uppercase tracking-wider text-neutral-500 mt-0.5">Badan Pengurus</p>
                </div>
                <div>
                    <p class="text-3xl font-black text-amber-600">15</p>
                    <p class="text-sm font-semibold uppercase tracking-wider text-neutral-500 mt-0.5">Tim Pelaksana</p>
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
                     open: { pengawas: true, pengurus: true, staff: true },
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
                    @foreach ($groups as $key => $group)
                    <div class="rounded-lg border border-neutral-200 overflow-hidden fade-in"
                         x-show="active === 'semua' || active === '{{ $key }}'"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0">

                        {{-- Header --}}
                        <button type="button"
                                @click="open['{{ $key }}'] = !open['{{ $key }}']"
                                class="w-full flex items-center justify-between px-5 py-4 bg-neutral-50 hover:bg-neutral-100 transition text-left">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-secondary/10 text-secondary flex items-center justify-center rounded-lg shrink-0">
                                    <i class="fa-solid {{ $group['icon'] }} text-base"></i>
                                </div>
                                <div>
                                    <span class="font-display font-bold text-neutral-900 text-lg">{{ $group['label'] }}</span>
                                    <span class="ml-2 text-sm text-neutral-400 font-normal">{{ $group['sub'] }}</span>
                                    <span class="ml-2 text-sm text-neutral-400">·</span>
                                    <span class="ml-1 text-sm text-neutral-400">{{ count($group['anggota']) }} personil</span>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-down text-neutral-400 text-sm transition-transform duration-200 shrink-0"
                               :class="open['{{ $key }}'] ? 'rotate-180' : ''"></i>
                        </button>

                        {{-- Konten --}}
                        <div x-show="open['{{ $key }}']"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100">
                            <div class="p-5 grid sm:grid-cols-2 xl:grid-cols-3 gap-3">
                                @foreach ($group['anggota'] as [$no, $nama, $jabatan, $gender])
                                <div class="rounded-lg bg-white border border-neutral-100 p-4 hover:border-secondary/40 hover:shadow-card transition">
                                    {{-- Top row --}}
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs font-mono text-neutral-300">#{{ sprintf('%02d', $no) }}</span>
                                        <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-full {{ $group['badge'] }}">
                                            @if($key === 'pengawas') Pengawas
                                            @elseif($key === 'pengurus') Pengurus
                                            @else Staff @endif
                                        </span>
                                    </div>
                                    {{-- Nama --}}
                                    <h4 class="font-display font-bold text-neutral-900 text-base leading-tight">{{ $nama }}</h4>
                                    {{-- Jabatan --}}
                                    <p class="text-neutral-500 text-sm mt-0.5">{{ $jabatan }}</p>
                                    {{-- Gender (hanya Badan Pengurus) --}}
                                    @if ($gender)
                                        <div class="mt-2">
                                            @if ($gender === 'P')
                                                <span class="inline-flex items-center gap-1 text-xs text-pink-600 bg-pink-50 px-2 py-0.5 rounded-full font-semibold">
                                                    <i class="fa-solid fa-venus text-xs"></i> Perempuan
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 text-xs text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full font-semibold">
                                                    <i class="fa-solid fa-mars text-xs"></i> Laki-laki
                                                </span>
                                            @endif
                                        </div>
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
                            <p class="text-xs font-bold uppercase tracking-widest text-neutral-500">Filter Kelompok</p>
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
                                      :class="active === 'semua' ? 'bg-white/20 text-white' : 'bg-neutral-100 text-neutral-500'">{{ $total }}</span>
                            </button>

                            @foreach ($groups as $key => $group)
                            <button type="button" @click="setTab('{{ $key }}')"
                                    :class="active === '{{ $key }}' ? 'bg-secondary text-white' : 'bg-white text-neutral-700 hover:bg-neutral-50'"
                                    class="w-full flex items-center justify-between px-4 py-3 text-left transition">
                                <div class="flex items-center gap-2.5">
                                    <i class="fa-solid {{ $group['icon'] }} text-sm w-4 text-center"></i>
                                    <span class="text-sm font-semibold leading-tight">{{ $group['label'] }}</span>
                                </div>
                                <span class="text-xs font-bold px-1.5 py-0.5 rounded shrink-0"
                                      :class="active === '{{ $key }}' ? 'bg-white/20 text-white' : 'bg-neutral-100 text-neutral-500'">{{ count($group['anggota']) }}</span>
                            </button>
                            @endforeach

                        </nav>
                        {{-- Periode info --}}
                        <div class="px-4 py-3 bg-neutral-50 border-t border-neutral-200">
                            <p class="text-xs text-neutral-400 leading-relaxed">
                                <i class="fa-solid fa-calendar-days mr-1"></i>
                                Periode Kerja<br>
                                <span class="font-semibold text-neutral-600">2020 – 2025</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
