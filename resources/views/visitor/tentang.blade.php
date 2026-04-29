@extends('layouts.visitor')
@section('title', 'Tentang Kami - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Tentang YALI Papua — Yayasan Lingkungan Hidup Papua')
@section('seo-description', 'Profil, visi, misi, dan program YALI Papua — organisasi masyarakat sipil di Tanah Papua yang berdiri sejak 1988.')

@section('content')

    {{-- Hero Banner --}}
    <div class="bg-primary py-16 relative overflow-hidden"><div class="absolute inset-0 opacity-[0.07]" style="background-image: linear-gradient(rgba(255,255,255,0.3) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 60px 60px;"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <span class="text-white/70 text-lg uppercase tracking-widest">
                <a href="{{ route('beranda') }}" class="hover:text-white">Beranda</a> › Tentang Kami
            </span>
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mt-3">Tentang YALI Papua</h1>
            <p class="text-white/70 mt-2 text-lg">Mengenal lebih dekat Yayasan Lingkungan Hidup Papua</p>
        </div>
    </div>

    {{-- Intro --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="fade-in">
                    <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-leaf mr-2"></i>Sejak 1988</p>
                    <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900 mb-6">Organisasi Masyarakat Sipil di Tanah Papua</h2>
                    <p class="text-neutral-600 leading-relaxed mb-4">Yayasan Lingkungan Hidup Papua (YALI Papua) adalah bagian dari Civil Society Organisation (CSO) yang bergerak di bidang pengorganisasian dan penguatan masyarakat adat, berkaitan dengan kepastian hak dan ruang hidupnya untuk kemandirian dan kesejahteraannya.</p>
                    <p class="text-neutral-600 leading-relaxed mb-6">Didirikan pada tahun 1988, lembaga ini mendampingi masyarakat adat Papua agar mampu mengorganisir diri dan merekonsiliasi hubungan dengan Tuhan dan alam semesta Papua untuk kehidupan yang berdaulat dan berkelanjutan.</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('sejarah') }}" class="bg-secondary text-white px-5 py-2.5 text-lg font-semibold hover:bg-secondary transition-colors">
                            <i class="fa-solid fa-clock-rotate-left mr-2"></i>Baca Sejarah
                        </a>
                        <a href="{{ route('profil') }}" class="border border-neutral-300 text-neutral-700 px-5 py-2.5 text-lg font-semibold hover:border-primary-400 hover:text-secondary transition-colors">
                            <i class="fa-solid fa-building mr-2"></i>Profil Lembaga
                        </a>
                    </div>
                </div>
                <div class="fade-in">
                    <img src="https://placehold.co/600x400" alt="Ilustrasi YALI Papua" class="w-full rounded-lg shadow-card object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <div class="border-t border-neutral-200 bg-neutral-50">
        <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center fade-in">
                <div class="text-3xl font-display font-bold text-secondary">1984</div>
                <div class="text-lg text-neutral-500 mt-1 uppercase tracking-wider">Tahun Berdiri</div>
            </div>
            <div class="text-center fade-in">
                <div class="text-3xl font-display font-bold text-secondary">40+</div>
                <div class="text-lg text-neutral-500 mt-1 uppercase tracking-wider">Tahun Berkarya</div>
            </div>
            <div class="text-center fade-in">
                <div class="text-3xl font-display font-bold text-accent-400">10+</div>
                <div class="text-lg text-neutral-500 mt-1 uppercase tracking-wider">Tahun Ekspor Kakao</div>
            </div>
            <div class="text-center fade-in">
                <div class="text-3xl font-display font-bold text-accent-400">4</div>
                <div class="text-lg text-neutral-500 mt-1 uppercase tracking-wider">Wilayah Kerja</div>
            </div>
        </div>
    </div>

    {{-- Visi Misi --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-12 fade-in text-center">
                <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-compass mr-2"></i>Arah Organisasi</p>
                <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Visi &amp; Misi</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-secondary text-white p-10 fade-in">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 bg-white/20 flex items-center justify-center">
                            <i class="fa-solid fa-eye text-white"></i>
                        </div>
                        <h3 class="font-display font-bold text-xl">Visi</h3>
                    </div>
                    <p class="text-white/50 leading-relaxed">Terwujudnya Masyarakat Adat Papua yang Mampu Mengorganisir Diri dan Merekonsiliasi Hubungan dengan Tuhan dan Alam Semesta Papua untuk Kehidupan yang Berdaulat dan Berkelanjutan dalam Berbagai Aspek Kehidupan di Tahun 2040.</p>
                </div>
                <div class="bg-neutral-50 border border-neutral-100 p-10 fade-in">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 bg-green-50 flex items-center justify-center">
                            <i class="fa-solid fa-bullseye text-secondary"></i>
                        </div>
                        <h3 class="font-display font-bold text-xl text-neutral-900">Misi</h3>
                    </div>
                    <ul class="space-y-2 text-neutral-600">
                        <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>Rekon</strong> — Mendorong rekonsiliasi hubungan antara Manusia dengan Tuhan dan Alam Semesta</span></li>
                        <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>PMA</strong> — Penguatan kapasitas kelembagaan Masyarakat Adat pada 7 wilayah adat di Tanah Papua</span></li>
                        <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>KPP</strong> — Kajian dan advokasi kebijakan hak-hak dasar Masyarakat Adat</span></li>
                        <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>PPA</strong> — Penguatan posisi perempuan adat di Tanah Papua</span></li>
                        <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>PEMA</strong> — Pengembangan ekonomi berbasiskan Masyarakat Adat Papua</span></li>
                        <li class="flex gap-2"><i class="fa-solid fa-check text-secondary mt-0.5 text-lg"></i><span><strong>PISD</strong> — Penguatan institusi dan sumber daya YALI</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Sub-halaman Navigation --}}
    <section class="py-16 bg-neutral-50 border-t border-neutral-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10 text-center fade-in">
                <p class="text-lg font-semibold tracking-widest uppercase text-secondary mb-2"><i class="fa-solid fa-sitemap mr-2"></i>Jelajahi Lebih Lanjut</p>
                <h2 class="text-2xl font-display font-bold text-neutral-900">Informasi Organisasi</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <a href="{{ route('sejarah') }}" class="bg-white shadow-card card-hover border border-neutral-100 p-6 fade-in group">
                    <div class="w-10 h-10 bg-green-50 flex items-center justify-center mb-4 group-hover:bg-secondary transition-colors">
                        <i class="fa-solid fa-clock-rotate-left text-secondary group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-display font-bold text-neutral-900 mb-1">Sejarah Singkat</h3>
                    <p class="text-neutral-500 text-lg">Perjalanan 40 tahun pengabdian YALI Papua sejak 1984.</p>
                </a>
                <a href="{{ route('profil') }}" class="bg-white shadow-card card-hover border border-neutral-100 p-6 fade-in group">
                    <div class="w-10 h-10 bg-green-50 flex items-center justify-center mb-4 group-hover:bg-secondary transition-colors">
                        <i class="fa-solid fa-building text-secondary group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-display font-bold text-neutral-900 mb-1">Profil Lembaga</h3>
                    <p class="text-neutral-500 text-lg">Visi, misi, wilayah kerja, dan identitas organisasi.</p>
                </a>
                <a href="{{ route('kepengurusan') }}" class="bg-white shadow-card card-hover border border-neutral-100 p-6 fade-in group">
                    <div class="w-10 h-10 bg-green-50 flex items-center justify-center mb-4 group-hover:bg-secondary transition-colors">
                        <i class="fa-solid fa-user-tie text-secondary group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-display font-bold text-neutral-900 mb-1">Direktur</h3>
                    <p class="text-neutral-500 text-lg">Direktur YALI Papua dari masa ke masa sejak 1984.</p>
                </a>
                <a href="{{ route('pilar-kerja') }}" class="bg-white shadow-card card-hover border border-neutral-100 p-6 fade-in group">
                    <div class="w-10 h-10 bg-accent-50 flex items-center justify-center mb-4 group-hover:bg-accent-400 transition-colors">
                        <i class="fa-solid fa-list-check text-accent-400 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="font-display font-bold text-neutral-900 mb-1">Bidang Kerja</h3>
                    <p class="text-neutral-500 text-lg">Struktur bidang kerja yang menopang program YALI Papua.</p>
                </a>
            </div>
        </div>
    </section>

@endsection
