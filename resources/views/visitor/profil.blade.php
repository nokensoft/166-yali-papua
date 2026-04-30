@extends('layouts.visitor')
@section('title', 'Tentang Kami - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Tentang Kami - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Mengenal lebih dekat Yayasan Lingkungan Hidup Papua, visi, misi, dan perjuangan kami.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Tentang Kami','item'=>route('profil')]]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    <section class="relative bg-gradient-to-br from-primary-800 via-primary-900 to-secondary-900 py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-secondary-400 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <span class="inline-block px-4 py-1.5 bg-white/15 backdrop-blur-sm rounded-full text-sm font-medium mb-4 border border-white/20">
                <i class="fa-solid fa-users mr-1"></i> Tentang Kami
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">Mengenal YALI Papua</h1>
            <p class="text-gray-300 max-w-2xl mx-auto">Berdedikasi untuk pelestarian lingkungan hidup dan pemberdayaan masyarakat adat di tanah Papua sejak 1994.</p>
            <nav class="mt-6 flex items-center justify-center gap-2 text-sm text-gray-300">
                <a href="{{ route('beranda') }}" class="hover:text-white transition">Beranda</a>
                <i class="fa-solid fa-chevron-right text-xs"></i>
                <span class="text-white font-semibold">Tentang Kami</span>
            </nav>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="inline-block px-4 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">
                        <i class="fa-solid fa-building mr-1"></i> Profil
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">Yayasan Lingkungan Hidup Papua</h2>
                    <p class="text-gray-600 mb-5 leading-relaxed"><strong>YALI Papua</strong> didirikan pada 26 Oktober 1994 oleh sekelompok aktivis lingkungan dan tokoh masyarakat adat Papua yang memiliki keprihatinan mendalam terhadap degradasi lingkungan dan marginalisasi masyarakat adat di tanah Papua.</p>
                    <p class="text-gray-600 mb-5 leading-relaxed">Kami bergerak di bidang advokasi lingkungan, pendampingan masyarakat adat, riset keanekaragaman hayati, dan edukasi lingkungan untuk generasi muda Papua.</p>
                    <p class="text-gray-600 leading-relaxed">Dengan jaringan yang tersebar di seluruh wilayah Papua, kami bekerja sama dengan masyarakat adat, pemerintah daerah, organisasi internasional, dan akademisi untuk mewujudkan Papua yang lestari dan berdaulat.</p>
                </div>
                <div class="bg-gradient-to-br from-primary-100 to-secondary-100 rounded-3xl p-8">
                    <div class="bg-white rounded-2xl shadow-lg p-8 grid grid-cols-2 gap-6 text-center">
                        <div>
                            <div class="text-4xl font-extrabold text-primary-700">15+</div>
                            <p class="text-sm text-gray-500 mt-1">Tahun Berdiri</p>
                        </div>
                        <div>
                            <div class="text-4xl font-extrabold text-secondary-600">50+</div>
                            <p class="text-sm text-gray-500 mt-1">Program Terlaksana</p>
                        </div>
                        <div>
                            <div class="text-4xl font-extrabold text-primary-700">200+</div>
                            <p class="text-sm text-gray-500 mt-1">Kampung Dampingan</p>
                        </div>
                        <div>
                            <div class="text-4xl font-extrabold text-secondary-600">5.000+</div>
                            <p class="text-sm text-gray-500 mt-1">Masyarakat Terbantu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="inline-block px-4 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fa-solid fa-compass mr-1"></i> Arah Kami
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">Visi & Misi</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <div class="w-14 h-14 bg-primary-100 rounded-xl flex items-center justify-center mb-5">
                        <i class="fa-solid fa-eye text-primary-700 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Visi</h3>
                    <p class="text-gray-600 leading-relaxed">Terwujudnya kelestarian lingkungan hidup, kedaulatan masyarakat adat, dan pembangunan berkelanjutan di tanah Papua untuk generasi kini dan mendatang.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <div class="w-14 h-14 bg-secondary-100 rounded-xl flex items-center justify-center mb-5">
                        <i class="fa-solid fa-bullseye text-secondary-700 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Misi</h3>
                    <ul class="text-gray-600 space-y-3 leading-relaxed">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-primary-600 mt-1 flex-shrink-0"></i>Melakukan advokasi kebijakan lingkungan dan hak masyarakat adat Papua.</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-primary-600 mt-1 flex-shrink-0"></i>Mendampingi masyarakat adat dalam pengelolaan sumber daya alam berkelanjutan.</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-primary-600 mt-1 flex-shrink-0"></i>Menyelenggarakan pendidikan dan kampanye kesadaran lingkungan.</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-circle-check text-primary-600 mt-1 flex-shrink-0"></i>Membangun jaringan kemitraan untuk pelestarian alam Papua.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="inline-block px-4 py-1 bg-secondary-100 text-secondary-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fa-solid fa-heart mr-1"></i> Prinsip Kami
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6" x-data="{
                values: [
                    { icon: 'fa-handshake', title: 'Kemitraan', desc: 'Bekerja bersama masyarakat adat sebagai mitra setara dalam setiap program.' },
                    { icon: 'fa-scale-balanced', title: 'Keadilan', desc: 'Memperjuangkan keadilan ekologis dan hak masyarakat adat Papua.' },
                    { icon: 'fa-eye', title: 'Transparansi', desc: 'Mengelola setiap sumber daya dengan akuntabel dan terbuka.' },
                    { icon: 'fa-seedling', title: 'Keberlanjutan', desc: 'Mengutamakan solusi jangka panjang yang ramah lingkungan.' }
                ]
            }">
                <template x-for="(v, i) in values" :key="i">
                    <div class="text-center p-6 rounded-2xl border border-gray-100 hover:shadow-lg transition hover:-translate-y-1">
                        <div class="w-14 h-14 bg-primary-100 text-primary-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <i :class="'fa-solid ' + v.icon + ' text-2xl'"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2" x-text="v.title"></h3>
                        <p class="text-sm text-gray-500" x-text="v.desc"></p>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="inline-block px-4 py-1 bg-primary-100 text-primary-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fa-solid fa-people-group mr-1"></i> Tim Kami
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">Orang-Orang di Balik YALI Papua</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Tim yang berdedikasi penuh untuk pelestarian alam dan pemberdayaan masyarakat adat Papua.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8" x-data="{
                team: [
                    { name: 'John Doe', role: 'Direktur Eksekutif', initials: 'JD' },
                    { name: 'Jane Doe', role: 'Manajer Program', initials: 'JD' },
                    { name: 'John Doe', role: 'Koordinator Advokasi', initials: 'JD' },
                    { name: 'Jane Doe', role: 'Koordinator Edukasi', initials: 'JD' }
                ]
            }">
                <template x-for="(m, i) in team" :key="i">
                    <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100 hover:shadow-lg transition">
                        <div class="w-24 h-24 bg-gradient-to-br from-primary-400 to-secondary-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl font-bold text-white" x-text="m.initials"></span>
                        </div>
                        <h3 class="font-bold text-gray-900" x-text="m.name"></h3>
                        <p class="text-sm text-primary-600 font-medium" x-text="m.role"></p>
                    </div>
                </template>
            </div>
        </div>
    </section>

@endsection
