@extends('layouts.visitor')
@section('title', 'Program')
@section('seo-title', 'Program YALI Papua')
@section('seo-description', 'Program-program pemberdayaan masyarakat adat Papua yang dijalankan YALI Papua.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Program']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    @include('partials.page-banner', [
        'title' => 'Program Kami',
        'breadcrumb' => 'Program Kami',
    ])

    



    {{-- Program Unggulan Overview Cards --}}
    <section class="py-16 bg-white border-b border-neutral-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10 fade-in">
                <p class="text-lg font-semibold tracking-widest uppercase text-emerald-600 mb-2">
                    <i class="fa-solid fa-list-ul mr-2"></i>KEGIATAN
                </p>
                <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Program Unggulan</h2>
                <p class="text-neutral-500 text-lg mt-3 max-w-3xl">Lima pilar program strategis YALI Papua untuk memperkuat posisi dan hak masyarakat adat di Tanah Papua.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group overflow-hidden">
                    <div class="h-1.5 bg-green-600"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-green-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-map-location-dot text-xl text-green-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-green-600 bg-green-50 px-2 py-1 mb-3 inline-block">PMA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-green-600 transition-colors">Penguatan Masyarakat Adat</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Pengorganisasian MA, penguatan kelembagaan adat, pendidikan dan pelatihan, pemetaan wilayah adat, kajian sosial budaya, dan perencanaan wilayah berbasis kearifan lokal.
                        </p>
                    </div>
                </div>

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group overflow-hidden">
                    <div class="h-1.5 bg-blue-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-blue-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-scale-balanced text-xl text-blue-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-blue-600 bg-blue-50 px-2 py-1 mb-3 inline-block">KPP</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-blue-600 transition-colors">Kajian Pendidikan Publik</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Kajian perundang-undangan, pendataan investasi, survei dan investigasi konflik, membangun sistem informasi data, kampanye advokasi.
                        </p>
                    </div>
                </div>

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group overflow-hidden">
                    <div class="h-1.5 bg-yellow-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-yellow-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-seedling text-xl text-yellow-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-yellow-600 bg-yellow-50 px-2 py-1 mb-3 inline-block">PEMA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-yellow-600 transition-colors">Pengembangan Ekonomi MA</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Penataan kelembagaan ekonomi, pengembangan potensi ekonomi, pelatihan keterampilan usaha dan desain produk, pengurusan perizinan usaha.
                        </p>
                    </div>
                </div>

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group overflow-hidden">
                    <div class="h-1.5 bg-pink-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-pink-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-users-gear text-xl text-pink-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-pink-600 bg-pink-50 px-2 py-1 mb-3 inline-block">PPA</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-pink-600 transition-colors">Penguatan Perempuan Adat</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Pemberdayaan kelompok perempuan, pendidikan dan pelatihan gender, peningkatan kapasitas, memperkuat partisipasi perempuan dalam ruang publik.
                        </p>
                    </div>
                </div>

                <div class="shadow-card rounded-lg card-hover bg-white border border-neutral-100 fade-in group sm:col-span-2 lg:col-span-2">
                    <div class="h-1.5 bg-orange-500"></div>
                    <div class="p-6">
                        <div class="w-12 h-12 bg-orange-50 flex items-center justify-center mb-4">
                            <i class="fa-solid fa-building-circle-check text-xl text-orange-600"></i>
                        </div>
                        <span class="text-lg font-bold tracking-widest uppercase text-orange-600 bg-orange-50 px-2 py-1 mb-3 inline-block">PISD</span>
                        <h3 class="font-display font-bold text-neutral-900 mb-4 group-hover:text-orange-600 transition-colors">Penguatan Institusi & Sumber Daya</h3>
                        <p class="text-neutral-500 text-lg leading-relaxed">
                            Penguatan kapasitas kelembagaan YALI, peningkatan sumber daya staf, pengelolaan aset, Fund Raising, dan memastikan keberlanjutan organisasi.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
