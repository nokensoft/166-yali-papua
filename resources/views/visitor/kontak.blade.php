@extends('layouts.visitor')
@section('title', 'Kontak - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Hubungi Kami - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Informasi kontak dan alamat ' . ($situs['nama_situs'] ?? 'YALI Papua'))

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Kontak']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    

<section class="relative bg-gradient-to-br from-primary-800 via-primary-900 to-secondary-900 h-[150px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-secondary-400 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-5xl sm:text-6xl font-extrabold mb-4">Kontak</h1>
    </div>
</section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                {{-- Kolom Kiri: Info Kontak --}}
                <div class="fade-in space-y-4">
                    <p class="text-lg font-semibold tracking-widest uppercase text-primary-700 mb-2">Informasi</p>
                    <h2 class="text-2xl font-display font-bold text-neutral-900 mb-6">Kontak Kami</h2>

                    {{-- Alamat --}}
                    @if (!empty($situs['alamat']))
                    <div class="flex gap-4 p-5 bg-neutral-50 border-l-4 border-primary-700 rounded-lg">
                        <div class="w-11 h-11 bg-primary-700 text-white flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-map-marker-alt text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-lg text-neutral-700 mb-1">Alamat</p>
                            <p class="text-neutral-500 text-lg leading-relaxed">{{ $situs['alamat'] }}</p>
                            @if (!empty($situs['koordinat_maps']))
                                <p class="text-neutral-400 text-lg mt-1"><i class="fa-solid fa-location-crosshairs mr-1"></i>{{ $situs['koordinat_maps'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- Telepon & Fax 
                    @if (!empty($situs['telepon']) || !empty($situs['fax']))
                    <div class="flex gap-4 p-5 bg-neutral-50 border-l-4 border-primary-700 rounded-lg">
                        <div class="w-11 h-11 bg-primary-700 text-white flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-phone text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-lg text-neutral-700 mb-1">Telepon</p>
                            @if (!empty($situs['telepon']))
                                <p class="text-neutral-500 text-lg">{{ $situs['telepon'] }}</p>
                            @endif
                            @if (!empty($situs['fax']))
                                <p class="text-neutral-500 text-lg">Fax: {{ $situs['fax'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endif
                    --}}

                    {{-- WhatsApp --}}
                    @if (!empty($situs['whatsapp_direktur']) || !empty($situs['whatsapp_ketua']))
                    <div class="flex gap-4 p-5 bg-neutral-50 border-l-4 border-primary-700 rounded-lg">
                        <div class="w-11 h-11 bg-primary-700 text-white flex items-center justify-center shrink-0">
                            <i class="fa-brands fa-whatsapp text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-lg text-neutral-700 mb-1">WhatsApp</p>
                            @if (!empty($situs['whatsapp_direktur']))
                                <p class="text-neutral-500 text-lg">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $situs['whatsapp_direktur']) }}" target="_blank" class="hover:text-primary-700 transition">
                                        {{ $situs['whatsapp_direktur'] }}
                                    </a>
                                    <span class="text-neutral-400">(Utama)</span>
                                </p>
                            @endif
                            @if (!empty($situs['whatsapp_ketua']))
                                <p class="text-neutral-500 text-lg">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $situs['whatsapp_ketua']) }}" target="_blank" class="hover:text-primary-700 transition">
                                        {{ $situs['whatsapp_ketua'] }}
                                    </a>
                                    <span class="text-neutral-400">(Alternatif)</span>
                                </p>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- Email --}}
                    
                    @if (!empty($situs['email']) || !empty($situs['email_direktur']) || !empty($situs['email_ketua']))
                    <div class="flex gap-4 p-5 bg-neutral-50 border-l-4 border-primary-700 rounded-lg">
                        <div class="w-11 h-11 bg-primary-700 text-white flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-lg text-neutral-700 mb-1">Email</p>
                            @if (!empty($situs['email']))
                                <p class="text-neutral-500 text-lg">
                                    <a href="mailto:{{ $situs['email'] }}" class="hover:text-primary-700 transition">{{ $situs['email'] }}</a>
                                    <span class="text-neutral-400">(Email Organisasi)</span>
                                </p>
                            @endif
                            @if (!empty($situs['email_direktur']))
                                <p class="text-neutral-500 text-lg">
                                    <a href="mailto:{{ $situs['email_direktur'] }}" class="hover:text-primary-700 transition">{{ $situs['email_direktur'] }}</a>
                                    <span class="text-neutral-400">(Email Direktur)</span>
                                </p>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- Website --}}
                    @if (!empty($situs['website']))
                    <div class="flex gap-4 p-5 bg-neutral-50 border-l-4 border-primary-700 rounded-lg">
                        <div class="w-11 h-11 bg-primary-700 text-white flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-globe text-lg"></i>
                        </div>
                        <div>
                            <p class="font-bold uppercase text-lg text-neutral-700 mb-1">Website</p>
                            <p class="text-neutral-500 text-lg">
                                <a href="https://{{ ltrim($situs['website'], 'https://') }}" target="_blank" rel="noopener noreferrer" class="hover:text-primary-700 transition">
                                    {{ $situs['website'] }}
                                </a>
                            </p>
                        </div>
                    </div>
                    @endif

                    {{-- Media Sosial --}}
                    @php
                        $sosmedLinks = collect([
                            ['key' => 'sosmed_facebook',  'icon' => 'fa-facebook-f', 'label' => 'Facebook',    'color' => 'bg-primary-700 hover:bg-primary-800'],
                            ['key' => 'sosmed_instagram', 'icon' => 'fa-instagram',  'label' => 'Instagram',   'color' => 'bg-pink-500 hover:bg-pink-600'],
                            ['key' => 'sosmed_youtube',   'icon' => 'fa-youtube',    'label' => 'YouTube',     'color' => 'bg-red-600 hover:bg-red-700'],
                            ['key' => 'sosmed_twitter',   'icon' => 'fa-x-twitter',  'label' => 'Twitter / X', 'color' => 'bg-neutral-900 hover:bg-black'],
                            ['key' => 'sosmed_tiktok',    'icon' => 'fa-tiktok',     'label' => 'TikTok',      'color' => 'bg-neutral-800 hover:bg-neutral-900'],
                        ])->filter(fn ($item) => !empty($situs[$item['key']]));
                    @endphp
                    @if ($sosmedLinks->isNotEmpty())
                    <div class="flex gap-4 p-5 bg-neutral-50 border-l-4 border-primary-700 rounded-lg">
                        <div class="w-11 h-11 bg-primary-700 text-white flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-share-nodes text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold uppercase text-lg text-neutral-700 mb-3">Media Sosial</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($sosmedLinks as $sosmed)
                                    <a href="{{ $situs[$sosmed['key']] }}" target="_blank" rel="noopener noreferrer"
                                       class="flex items-center gap-2 px-4 py-2 {{ $sosmed['color'] }} text-white text-lg font-semibold transition">
                                        <i class="fa-brands {{ $sosmed['icon'] }}"></i>
                                        {{ $sosmed['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

                {{-- Kolom Kanan: Peta --}}
                <div class="fade-in">
                    <p class="text-lg font-semibold tracking-widest uppercase text-primary-700 mb-2">Lokasi</p>
                    <h2 class="text-2xl font-display font-bold text-neutral-900 mb-6">Temukan Kami</h2>

                    @if (!empty($situs['google_maps_embed']))
                        <iframe src="{{ $situs['google_maps_embed'] }}" width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full block"></iframe>
                    @else
                        <div class="w-full h-96 bg-neutral-100 flex items-center justify-center text-neutral-400">
                            <span class="text-lg">Peta belum dikonfigurasi.</span>
                        </div>
                    @endif

                    @if (!empty($situs['google_maps_link']))
                        <div class="mt-4 flex items-center gap-3">
                            <a href="{{ $situs['google_maps_link'] }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center gap-2 bg-primary-700 text-white px-5 py-3 text-lg font-semibold hover:bg-primary-800 transition">
                                <i class="fa-solid fa-map-location-dot"></i>
                                Buka di Google Maps
                            </a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
