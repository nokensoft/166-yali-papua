@extends('layouts.visitor')
@section('title', 'FAQ - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'FAQ - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Pertanyaan yang sering diajukan seputar profil lembaga, donasi, kemitraan, dan fitur website YALI Papua.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'FAQ']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    @include('partials.page-banner', [
        'title' => 'FAQ',
        'breadcrumb' => 'FAQ',
    ])

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-12 fade-in text-center">
                <p class="text-xs font-semibold tracking-widest uppercase text-primary-700 mb-2"><i class="fa-solid fa-circle-question mr-2"></i>Pusat Bantuan</p>
                <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-neutral-500 mt-3 max-w-2xl mx-auto">Temukan jawaban ringkas seputar profil lembaga, donasi, kemitraan, fitur website, dan layanan publik YALI Papua.</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                    <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-primary-700 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">1</span>Apa itu YALI Papua?</h3></div>
                    <div class="p-5"><p class="text-neutral-600 leading-relaxed">YALI Papua (<em>Perkumpulan Terbatas untuk Pengkajian dan Pemberdayaan Masyarakat Adat Papua</em>) adalah organisasi masyarakat sipil (CSO) yang bergerak di bidang pengorganisasian dan penguatan masyarakat adat Papua. Didirikan pada tahun 1988, lembaga ini bekerja melalui 5 pilar program: Penguatan Masyarakat Adat (PMA), Kajian Pendidikan Publik (KPP), Pengembangan Ekonomi Masyarakat Adat (PEMA), Penguatan Perempuan Adat (PPA), dan Penguatan Institusi &amp; Sumber Daya (PISD).</p></div>
                </div>

                <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                    <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-primary-700 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">2</span>Apa visi dan misi YALI Papua?</h3></div>
                    <div class="p-5"><p class="text-neutral-600 leading-relaxed">Visi YALI Papua adalah terwujudnya masyarakat adat Papua yang mampu mengorganisir diri serta menjaga relasi harmonis dengan Tuhan dan alam untuk kehidupan yang berdaulat dan berkelanjutan. Misi kami mencakup penguatan kelembagaan adat, kajian kebijakan, pengembangan ekonomi masyarakat, penguatan perempuan adat, dan penguatan institusi lembaga. Detailnya dapat dilihat di halaman <a href="{{ route('profil') }}" class="text-primary-700 underline font-semibold">Profil Lembaga</a>.</p></div>
                </div>

                <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                    <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-primary-700 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">3</span>Di mana saja wilayah kerja YALI Papua?</h3></div>
                    <div class="p-5"><p class="text-neutral-600 leading-relaxed">YALI Papua berkantor pusat di Kota Jayapura dan bekerja bersama komunitas mitra di berbagai wilayah Papua, termasuk wilayah adat prioritas di Tanah Papua. Untuk alamat kantor terbaru dan titik lokasi, silakan lihat halaman <a href="{{ route('kontak') }}" class="text-primary-700 underline font-semibold">Kontak</a>.</p></div>
                </div>

                <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                    <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-primary-700 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">4</span>Bagaimana cara berdonasi untuk program YALI Papua?</h3></div>
                    <div class="p-5"><p class="text-neutral-600 leading-relaxed">Buka halaman <a href="{{ route('donasi') }}" class="text-primary-700 underline font-semibold">Donasi</a>, pilih nominal yang tersedia (Rp 50rb, Rp 150rb, Rp 500rb, atau jumlah lain), lalu transfer ke rekening resmi yang ditampilkan. Anda juga bisa menggunakan tombol <strong>Copy</strong> pada nomor rekening agar lebih mudah. Setelah transfer, simpan bukti dan konfirmasi melalui halaman <a href="{{ route('kontak') }}" class="text-primary-700 underline font-semibold">Kontak</a>.</p></div>
                </div>

                <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                    <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-primary-700 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">5</span>Apakah website mendukung pilihan bahasa ID / EN?</h3></div>
                    <div class="p-5"><p class="text-neutral-600 leading-relaxed">Ya. Website menyediakan pilihan bahasa Indonesia (ID) dan English (EN) melalui tautan penerjemah di topbar. Fitur ini menggunakan Google Translate custom agar pengalaman membaca tetap rapi tanpa menampilkan translate bar bawaan.</p></div>
                </div>

                <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                    <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-primary-700 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">6</span>Bagaimana cara bermitra dengan YALI Papua?</h3></div>
                    <div class="p-5"><p class="text-neutral-600 leading-relaxed">YALI Papua terbuka untuk kemitraan dengan lembaga pemerintah, organisasi masyarakat sipil, komunitas, lembaga pendidikan, hingga sektor swasta yang sejalan dengan misi pemberdayaan masyarakat adat. Silakan kirimkan kebutuhan kerja sama melalui halaman <a href="{{ route('kontak') }}" class="text-primary-700 underline font-semibold">Kontak</a>.</p></div>
                </div>

                <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                    <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-primary-700 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">7</span>Apakah konten blog berasal dari YALI Papua sendiri?</h3></div>
                    <div class="p-5"><p class="text-neutral-600 leading-relaxed">Blog YALI Papua memuat artikel asli dari tim internal, serta artikel pilihan yang direferensikan dari media tepercaya. Untuk konten rujukan pihak ketiga, kami mencantumkan sumber asli sebagai bentuk penghormatan hak cipta dan transparansi informasi.</p></div>
                </div>

                <div class="rounded-lg overflow-hidden border border-neutral-200 fade-in">
                    <div class="p-5 bg-neutral-50"><h3 class="font-display font-bold text-neutral-900 flex items-center gap-3"><span class="w-7 h-7 bg-primary-700 text-white text-xs font-bold flex items-center justify-center flex-shrink-0">8</span>Apakah website ini menyediakan sitemap untuk SEO?</h3></div>
                    <div class="p-5"><p class="text-neutral-600 leading-relaxed">Ya, kami menyediakan <a href="{{ url('/sitemap.xml') }}" class="text-primary-700 underline font-semibold">sitemap XML</a> untuk membantu mesin pencari mengindeks halaman publik. Kami juga menyediakan halaman <a href="{{ route('peta-situs') }}" class="text-primary-700 underline font-semibold">Peta Situs</a> agar pengunjung lebih mudah menelusuri seluruh konten utama.</p></div>
                </div>
            </div>
        </div>
    </section>
@endsection
