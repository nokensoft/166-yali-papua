@extends('layouts.visitor')
@section('title', 'Bidang Kerja - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Bidang Kerja YALI Papua')
@section('seo-description', 'Program kerja YALI Papua: PMA, KPP, PEMA, PPA, dan PISD untuk pemberdayaan masyarakat adat Papua.')

@section('content')
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest"><a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> › Tentang › Bidang Kerja</span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">Pilar Program Kerja</h1>
            <p class="text-white/70 text-lg mt-3 max-w-xl">Lima pilar program strategis YALI Papua untuk pemberdayaan masyarakat adat di 7 wilayah adat Tanah Papua.</p>
        </div>
    </div>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
           <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="shadow-card card-hover bg-white border border-neutral-100 fade-in group">
                    <div class="h-1.5 bg-green-600"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-green-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-map-location-dot text-xl text-green-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-green-600 bg-green-50 px-2 py-1 mb-3 inline-block">PMA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-green-600 transition-colors">Penguatan Masyarakat Adat</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Pengorganisasian MA, penguatan kelembagaan adat, pendidikan dan pelatihan, pemetaan wilayah adat, kajian sosial budaya, survei potensi ekonomi, dan perencanaan wilayah berbasis kearifan lokal dalam menghadapi perubahan iklim.
                        </p>
                    </div>
                </div>

                <div class="shadow-card card-hover bg-white border border-neutral-100 fade-in group">
                    <div class="h-1.5 bg-blue-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-blue-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-scale-balanced text-xl text-blue-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-2 py-1 mb-3 inline-block">KPP</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-blue-600 transition-colors">Kajian Pendidikan Publik</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Kajian perundang-undangan, pendataan investasi, survei dan investigasi konflik, membangun sistem informasi data, pengembangan media dan jaringan, kampanye advokasi, serta mendorong kebijakan daerah yang melindungi hak masyarakat adat.
                        </p>
                    </div>
                </div>

                <div class="shadow-card card-hover bg-white border border-neutral-100 fade-in group">
                    <div class="h-1.5 bg-yellow-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-yellow-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-seedling text-xl text-yellow-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-yellow-600 bg-yellow-50 px-2 py-1 mb-3 inline-block">PEMA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-yellow-600 transition-colors">Pengembangan Ekonomi MA</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Penataan kelembagaan ekonomi, pengembangan sumber potensi ekonomi, pelatihan keterampilan usaha dan desain produk, pengurusan perizinan usaha, serta mengusahakan jaringan pemasaran.
                        </p>
                    </div>
                </div>

                <div class="shadow-card card-hover bg-white border border-neutral-100 fade-in group">
                    <div class="h-1.5 bg-pink-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-pink-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-users-gear text-xl text-pink-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-pink-600 bg-pink-50 px-2 py-1 mb-3 inline-block">PPA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-pink-600 transition-colors">Penguatan Perempuan Adat</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Pemberdayaan kelompok perempuan melalui organisasi perempuan, pendidikan dan pelatihan gender, peningkatan kapasitas, memperkuat partisipasi perempuan dalam ruang publik serta menjaga generasi dan masa depan Tanah Papua.
                        </p>
                    </div>
                </div>

                <div class="shadow-card card-hover bg-white border border-neutral-100 fade-in group sm:col-span-2 lg:col-span-2">
                    <div class="h-1.5 bg-orange-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-orange-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-building-circle-check text-xl text-orange-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-orange-600 bg-orange-50 px-2 py-1 mb-3 inline-block">PISD</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-orange-600 transition-colors">Penguatan Institusi & Sumber Daya</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Penguatan kapasitas kelembagaan YALI melalui peningkatan sumber daya staf, pendataan dan pengelolaan aset, pengefektifan manajemen sistem internal, rapat-rapat internal, Rapat Badan Pengurus dan Rapat Anggota Tahunan, Fund Raising, dan memastikan keberlanjutan organisasi.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-neutral-50 border-t border-neutral-100">
        <div class="max-w-7xl mx-auto px-6 text-center fade-in">
            <h2 class="text-xl md:text-2xl font-display font-bold text-neutral-900 mb-3">Ingin Tahu Lebih Lanjut?</h2>
            <p class="text-neutral-500 max-w-lg mx-auto mb-6">Pelajari program-program yang dijalankan oleh setiap bidang kerja YALI Papua.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('program') }}" class="bg-secondary text-white px-8 py-3 text-lg font-semibold hover:bg-secondary transition-colors shadow-card">
                    <i class="fa-solid fa-list-check mr-2"></i>Lihat Program
                </a>
                <a href="{{ route('kontak') }}" class="border border-neutral-300 text-neutral-700 px-8 py-3 text-lg font-semibold hover:border-primary-400 hover:text-secondary transition-colors">
                    <i class="fa-solid fa-envelope mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection
