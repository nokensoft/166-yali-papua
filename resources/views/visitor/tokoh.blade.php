@extends('layouts.visitor')
@section('title', 'Direktur dari Masa ke Masa - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Direktur YALI Papua dari Masa ke Masa')
@section('seo-description', 'Daftar direktur YALI Papua dari tahun 1984 hingga sekarang.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Tentang','item'=>route('profil')],['@type'=>'ListItem','position'=>3,'name'=>'Direktur']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest">
                <a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> ›
                <a href="{{ route('profil') }}" class="hover:text-white">Tentang</a> › Direktur
            </span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">Direktur dari Masa ke Masa</h1>
            <p class="text-white/70 mt-2 text-lg">Pemimpin yang menggerakkan YALI Papua sejak 1984</p>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-5xl mx-auto px-6">
            <div class="mb-14 fade-in">
                <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-user-tie mr-2"></i>Kepemimpinan</p>
                <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-4">Estafet Kepemimpinan YALI Papua</h2>
                <p class="text-neutral-600 leading-relaxed max-w-2xl">Selama lebih dari tiga dekade, YALI Papua telah dipimpin oleh beberapa direktur yang masing-masing membawa dedikasi dan visi dalam memajukan pemberdayaan masyarakat adat Papua.</p>
            </div>

            @php
                $direktur = [
                    [
                        'no'      => 1,
                        'nama'    => 'George Junus Aditjondro',
                        'periode' => '1982 – 1986', // Diasumsikan 1982 karena periode berikutnya mulai 1986
                        'label'   => 'Direktur Pertama',
                        'foto'    => null,
                        'aktif'   => false,
                    ],
                    [
                        'no'      => 2,
                        'nama'    => 'Ir. Agus Rumansara, MA',
                        'periode' => '1986 – 1987',
                        'label'   => 'Direktur Kedua',
                        'foto'    => null,
                        'aktif'   => false,
                    ],
                    [
                        'no'      => 3,
                        'nama'    => 'Antonis A. Rahawarin, B.A',
                        'periode' => '1988 – 1991',
                        'label'   => 'Direktur Ketiga',
                        'foto'    => null,
                        'aktif'   => false,
                    ],
                    [
                        'no'      => 4,
                        'nama'    => 'Ir. Cliff R. Marlessy',
                        'periode' => '1992 – 1994',
                        'label'   => 'Direktur Keempat',
                        'foto'    => null,
                        'aktif'   => false,
                    ],
                    [
                        'no'      => 5,
                        'nama'    => 'Fientje S. Jarangga, SE',
                        'periode' => '1995 – 1997',
                        'label'   => 'Direktur Kelima',
                        'foto'    => null,
                        'aktif'   => false,
                    ],
                    [
                        'no'      => 6,
                        'nama'    => 'Drs. Decky A. Rumaropen',
                        'periode' => '1998 – 2022',
                        'label'   => 'Direktur Terlama · 24 Tahun',
                        'foto'    => null,
                        'aktif'   => false,
                    ],
                    [
                        'no'      => 7,
                        'nama'    => 'Drs. Johanes Hambur',
                        'periode' => '2024 – Sekarang',
                        'label'   => 'Direktur Aktif',
                        'foto'    => null,
                        'aktif'   => true,
                    ],
                ];
                @endphp

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($direktur as $d)
                <div class="rounded-lg overflow-hidden bg-white border {{ $d['aktif'] ? 'border-primary-300 shadow-card' : 'border-neutral-100' }} fade-in relative">
                    @if ($d['aktif'])
                        <div class="absolute top-3 right-3">
                            <span class="bg-secondary text-white text-lg font-bold px-2 py-0.5 uppercase tracking-wider">Aktif</span>
                        </div>
                    @endif
                    {{-- Foto / Avatar --}}
                    <div class="h-48 {{ $d['aktif'] ? 'bg-green-50' : 'bg-neutral-50' }} flex items-center justify-center">
                        @if ($d['foto'])
                            <img src="{{ asset($d['foto']) }}" alt="{{ $d['nama'] }}"
                                 class="w-28 h-28 rounded-full object-cover border-4 {{ $d['aktif'] ? 'border-secondary/40' : 'border-white' }} shadow"
                                 onerror="this.onerror=null;this.src='https://placehold.co/400'">
                        @else
                            <img src="https://placehold.co/400"
                                 alt="{{ $d['nama'] }}"
                                 class="w-28 h-28 rounded-full object-cover border-4 {{ $d['aktif'] ? 'border-secondary/40' : 'border-white' }} shadow">
                        @endif
                    </div>
                    {{-- Info --}}
                    <div class="p-5">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-6 h-6 rounded-full bg-secondary text-white text-lg font-bold flex items-center justify-center flex-shrink-0">{{ $d['no'] }}</span>
                            <span class="text-lg text-secondary font-semibold uppercase tracking-wider">{{ $d['label'] }}</span>
                        </div>
                        <h3 class="font-display font-bold text-neutral-900 text-lg mt-2 mb-1">{{ $d['nama'] }}</h3>
                        <p class="text-lg text-neutral-500">
                            <i class="fa-regular fa-calendar mr-1.5 text-neutral-300"></i>{{ $d['periode'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
