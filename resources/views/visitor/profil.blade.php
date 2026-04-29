@extends('layouts.visitor')
@section('title', 'Profil - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Profil Organisasi YALI Papua')
@section('seo-description', 'Profil, visi, misi, dan struktur organisasi YALI Papua.')

@section('content')
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest"><a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> › Tentang › Profil</span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">Profil Organisasi</h1>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-start">
                <div class="fade-in">
                    <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-building mr-2"></i>Organisasi</p>
                    <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-6">Tentang YALI Papua</h2>
                    <p class="text-neutral-600 leading-relaxed mb-4">Yayasan Lingkungan Hidup Papua (YALI Papua) adalah bagian dari Civil Society Organisation (CSO) yang bergerak di bidang pengorganisasian dan penguatan masyarakat adat, berkaitan dengan kepastian hak dan ruang hidupnya untuk kemandirian dan kesejahteraannya.</p>
                    <p class="text-neutral-600 leading-relaxed mb-4"><em>Papua Environmental Foundation</em></p>
                    <p class="text-neutral-600 leading-relaxed mb-6">Berbasis di Jayapura, lembaga ini bekerja di beberapa kabupaten di Provinsi Papua dan Papua Selatan dengan fokus pada pengorganisasian masyarakat adat, advokasi kebijakan, pengembangan ekonomi, dan penguatan perempuan adat.</p>
                    <img src="https://placehold.co/600x400" alt="Ilustrasi YALI Papua" class="w-full rounded-lg shadow-card"/>
                </div>
                <div class="space-y-8">
                    <div class="fade-in">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-green-50 flex items-center justify-center"><i class="fa-solid fa-eye text-secondary"></i></div>
                            <h3 class="font-display font-bold text-neutral-900">Visi</h3>
                        </div>
                        <p class="text-neutral-600 leading-relaxed pl-11">Terwujudnya Masyarakat Adat Papua yang Mampu Mengorganisir Diri dan Merekonsiliasi Hubungan dengan Tuhan dan Alam Semesta Papua untuk Kehidupan yang Berdaulat dan Berkelanjutan dalam Berbagai Aspek Kehidupan di Tahun 2040.</p>
                    </div>
                    <div class="fade-in">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-green-50 flex items-center justify-center"><i class="fa-solid fa-bullseye text-secondary"></i></div>
                            <h3 class="font-display font-bold text-neutral-900">Misi</h3>
                        </div>
                        <ul class="text-neutral-600 space-y-2 pl-11">
                            <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>Rekon</strong> — Mendorong rekonsiliasi (nilai, norma, spirit) hubungan antara Manusia dengan Tuhan dan Alam Semesta</span></li>
                            <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>PMA</strong> — Terorganisir dan menguatnya kapasitas kelembagaan Masyarakat Adat dalam rangka menentukan posisi strategis untuk meningkatkan posisi tawarnya dalam aspek ekosob dan sipol menuju kemandirian pada 7 wilayah adat di Tanah Papua</span></li>
                            <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>KPP</strong> — Melakukan kajian dan advokasi kebijakan yang membatasi ruang, akses, dan kontrol hak-hak dasar Ekosob dan Sipol Masyarakat Adat pada 7 wilayah adat di Tanah Papua</span></li>
                            <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>PPA</strong> — Menguatnya posisi perempuan adat dalam mengembangkan potensi diri guna keberlanjutan hidup komunitas adat di Tanah Papua</span></li>
                            <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>PEMA</strong> — Mengelola potensi SDA dalam rangka pemberdayaan dan pengembangan Ekosob berbasiskan Masyarakat Adat Papua</span></li>
                            <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>PISD</strong> — Meningkatnya kapasitas dan kemandirian YALI dalam menyediakan sumber daya yang memadai guna mendukung pelaksanaan program dan operasional</span></li>
                        </ul>
                    </div>
                    <div class="fade-in">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-accent-50 flex items-center justify-center"><i class="fa-solid fa-map-pin text-accent-400"></i></div>
                            <h3 class="font-display font-bold text-neutral-900">Wilayah Kerja</h3>
                        </div>
                        <ul class="text-neutral-600 space-y-1 pl-11">
                            <li class="flex gap-2"><i class="fa-solid fa-location-dot text-accent-400 mt-0.5 text-lg"></i><span><strong>Provinsi Papua</strong> — Kabupaten Jayapura (Kantor Pusat, fokus PMA, KPP, PISD)</span></li>
                            <li class="flex gap-2"><i class="fa-solid fa-location-dot text-accent-400 mt-0.5 text-lg"></i><span><strong>Provinsi Papua</strong> — Kabupaten Sarmi (Pengorganisasian masyarakat adat pesisir dan pedalaman)</span></li>
                            <li class="flex gap-2"><i class="fa-solid fa-location-dot text-accent-400 mt-0.5 text-lg"></i><span><strong>Provinsi Papua Selatan</strong> — Kabupaten Mappi (Pengembangan ekonomi dan perlindungan hak adat)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-neutral-50">
        <div class="max-w-7xl mx-auto px-6">

            
            


            <div class="mb-16">
                <div class="mb-12 text-center fade-in">
                    <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2">
                        <i class="fa-solid fa-user-tie mr-2"></i>Kepemimpinan
                    </p>
                    <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Direktur dari Masa ke Masa</h2>
                    <p class="text-neutral-500 text-lg mt-2">Pejabat Direktur YALI Papua, Th. 1982 – 2026</p>
                </div>

                <div class="relative">
                    {{-- Garis Tengah (Desktop) --}}
                    <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-px bg-green-100 -translate-x-1/2"></div>

                    <div class="space-y-12 md:space-y-8 relative">
                        @foreach ([
                            ['no'=>1, 'nama'=>'George Junus Aditjondro', 'periode'=>'1982 – 1986', 'ket'=>'Direktur Pertama', 'img'=>'https://ui-avatars.com/api/?name=George+Junus+Aditjondro&background=0D8ABC&color=fff'],
                            ['no'=>2, 'nama'=>'Ir. August Rumansara, MA', 'periode'=>'1986 – 1987', 'ket'=>'', 'img'=>'https://ui-avatars.com/api/?name=August+Rumansara&background=0D8ABC&color=fff'],
                            ['no'=>3, 'nama'=>'Antonius A. Rahawarin, BA', 'periode'=>'1988 – 1991', 'ket'=>'', 'img'=>'https://ui-avatars.com/api/?name=Antonius+Rahawarin&background=0D8ABC&color=fff'],
                            ['no'=>4, 'nama'=>'Ir. Cliff R. Marlessy', 'periode'=>'1992 – 1994', 'ket'=>'', 'img'=>'https://ui-avatars.com/api/?name=Cliff+Marlessy&background=0D8ABC&color=fff'],
                            ['no'=>5, 'nama'=>'Fientje Salomina Jarangga, SE', 'periode'=>'1995 – 1997', 'ket'=>'', 'img'=>'https://ui-avatars.com/api/?name=Fientje+Jarangga&background=0D8ABC&color=fff'],
                            ['no'=>6, 'nama'=>'Drs. Decky Rumaropen', 'periode'=>'1998 – 2022', 'ket'=>'Direktur Terlama — 24 Tahun', 'img'=>'https://ui-avatars.com/api/?name=Decky+Rumaropen&background=0D8ABC&color=fff'],
                            ['no'=>7, 'nama'=>'Drs. Yohannes Hambur', 'periode'=>'2024 – Sekarang', 'ket'=>'Direktur Aktif', 'img'=>'https://ui-avatars.com/api/?name=Yohannes+Hambur&background=0D8ABC&color=fff'],
                        ] as $index => $d)
                        
                        <div class="flex flex-col md:flex-row md:items-center gap-6 md:gap-0 fade-in">
                            {{-- Sisi Nama (Kiri pada Desktop) --}}
                            <div class="md:w-1/2 flex items-center gap-4 {{ $index % 2 == 0 ? 'md:flex-row-reverse md:text-right md:pr-12' : 'md:pl-12' }}">
                                <div class="relative flex-shrink-0">
                                    <img src="{{ $d['img'] }}" alt="{{ $d['nama'] }}" class="w-14 h-14 rounded-full border-2 border-white shadow-md object-cover grayscale hover:grayscale-0 transition-all duration-300">
                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-secondary rounded-full flex items-center justify-center text-lg text-white font-bold border-2 border-white md:hidden">
                                        {{ $d['no'] }}
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-display font-bold text-neutral-900 text-lg leading-tight">{{ $d['nama'] }}</h4>
                                    @if($d['ket'])
                                        <p class="text-lg uppercase tracking-wider text-secondary font-bold mt-1">{{ $d['ket'] }}</p>
                                    @endif
                                    <p class="text-lg text-neutral-500 mt-1 md:hidden"><i class="fa-regular fa-calendar mr-1"></i> {{ $d['periode'] }}</p>
                                </div>
                            </div>

                            {{-- Nomor Tengah (Desktop) --}}
                            <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 z-10 w-10 h-10 rounded-full bg-white border-2 border-secondary text-secondary items-center justify-center font-bold text-lg shadow-sm">
                                {{ $d['no'] }}
                            </div>

                            {{-- Sisi Periode (Kanan pada Desktop) --}}
                            <div class="md:w-1/2 hidden md:block {{ $index % 2 == 0 ? 'md:pl-12' : 'md:pr-12 md:text-right' }}">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-green-50 text-secondary text-lg font-bold border border-secondary/20">
                                    <i class="fa-regular fa-calendar mr-2 opacity-70"></i> {{ $d['periode'] }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>






            {{-- Identitas Lembaga --}}
            <div class="mb-12 fade-in">
                <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2">Data</p>
                <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Identitas Lembaga</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([
                    ['label'=>'Nama Resmi','value'=>'Yayasan Lingkungan Hidup Papua'],
                    ['label'=>'Singkatan','value'=>'YALI Papua'],
                    ['label'=>'Nama Inggris','value'=>'Papua Environmental Foundation'],
                    ['label'=>'Periode Kerja','value'=>'2020 – 2025'],
                    ['label'=>'Kantor Pusat','value'=>$situs['alamat'] ?? 'Jl. Pramuka No. 18, Buper Waena, Kota Jayapura, Provinsi Papua, Indonesia'],
                    ['label'=>'Bidang Fokus','value'=>'Pengkajian dan Pemberdayaan Masyarakat Adat Papua'],
                ] as $item)
                <div class="bg-white p-6 shadow-card fade-in">
                    <p class="text-lg text-neutral-400 uppercase tracking-wider mb-1">{{ $item['label'] }}</p>
                    <p class="font-semibold text-neutral-900">{{ $item['value'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
