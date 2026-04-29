@extends('layouts.visitor')
@section('title', 'Sejarah - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Sejarah berdiri dan perjalanan panjang Yayasan Lingkungan Hidup Papua (YALI Papua) sejak 1988.')

@section('content')
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest"><a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> › Tentang › Sejarah</span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">Sejarah YALI Papua</h1>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-leaf mr-2"></i>Tentang Kami</p>
            <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-6">Perjalanan 40 Tahun Pengabdian</h2>
            <img src="https://placehold.co/600x400" alt="Ilustrasi Sejarah YALI Papua" class="w-full rounded-lg shadow-card mb-8 object-contain max-h-80 bg-white p-4"/>
            <div class="space-y-5 text-neutral-600 leading-relaxed">
                <p>Yayasan Lingkungan Hidup Papua (YALI Papua) adalah bagian dari Civil Society Organisation (CSO) yang bergerak di bidang pengorganisasian dan penguatan masyarakat adat.</p>
                <p>Didirikan pada tahun <strong>1988</strong> dengan nama Yayasan Pendidikan Hukum Masyarakat Adat (YKPHMA) Irian Jaya, oleh Ibu Maria Ruwiastuti, Zadrak Wamebu, Dr. Loupaty, dan beberapa pendiri lainnya — sebagai respons atas kondisi HAM masyarakat adat yang semakin tertindas di Papua.</p>
                <p>Sejak awal berdirinya, YALI Papua berkomitmen menempatkan masyarakat adat Papua sebagai <em>subjek</em> — bukan objek — dalam proses pembangunan. Lembaga ini hadir sebagai jembatan informasi dan agen perubahan bagi masyarakat dalam mempertahankan hak-hak mereka atas tanah dan sumber daya alam.</p>
                <p>Selama lebih dari tiga dekade, YALI Papua telah mendampingi masyarakat adat di berbagai wilayah Papua, termasuk Kabupaten Jayapura, Kabupaten Sarmi, dan Kabupaten Mappi.</p>
            </div>
            <div class="mt-16">
                <h3 class="text-xl font-display font-bold text-neutral-900 mb-8">Tonggak Sejarah</h3>
                <div class="relative border-l-2 border-secondary/40 pl-8 space-y-8">
                    @foreach ([
                        ['tahun'=>'1988','judul'=>'Pendirian YKPHMA','desc'=>'Didirikan dengan nama Yayasan Pendidikan Hukum Masyarakat Adat (YKPHMA) Irian Jaya oleh Maria Ruwiastuti, Zadrak Wamebu, dan Dr. Loupaty.'],
                        ['tahun'=>'1997','judul'=>'Akta Pendirian Resmi','desc'=>'Akta pendirian resmi YALI Papua ditandatangani pada 31 Oktober 1997.'],
                        ['tahun'=>'2020','judul'=>'Periode Kerja Baru','desc'=>'Memasuki periode kerja 2020–2025 dengan 5 pilar program strategis: PMA, KPP, PEMA, PPA, dan PISD.'],
                        ['tahun'=>'2025','judul'=>'Penguatan Kelembagaan','desc'=>'Melanjutkan penguatan kapasitas kelembagaan dan program pemberdayaan masyarakat adat di 7 wilayah adat Tanah Papua.'],
                    ] as $tm)
                    <div class="relative fade-in">
                        <div class="absolute -left-10 w-4 h-4 rounded-full bg-secondary border-2 border-white shadow"></div>
                        <span class="inline-block text-lg font-bold bg-green-50 text-secondary px-3 py-1 mb-2">{{ $tm['tahun'] }}</span>
                        <h4 class="font-display font-bold text-neutral-900">{{ $tm['judul'] }}</h4>
                        <p class="text-neutral-500 text-lg mt-1">{{ $tm['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
