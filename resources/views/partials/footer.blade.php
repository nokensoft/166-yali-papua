@php
    $waNumber = !empty($situs['sosmed_whatsapp']) ? preg_replace('/[^0-9]/', '', $situs['sosmed_whatsapp']) : null;
    $sessionUser = session('user');
    $footerAccountLabel = $sessionUser['name'] ?? 'Login';
    $footerAccountUrl = match ($sessionUser['role'] ?? null) {
        'admin_master' => route('admin.dashboard'),
        'penulis' => route('penulis.dashboard'),
        default => route('login'),
    };
@endphp
<div x-data="{ developmentInfoOpen: false }">

@if ($waNumber)
    <a href="https://wa.me/{{ $waNumber }}?text=Halo%20YALI%20Papua%2C%20saya%20ingin%20bertanya."
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Chat CS WhatsApp"
       class="fixed bottom-6 right-6 w-12 h-12 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center transition z-50">
        <i class="fa-brands fa-whatsapp text-2xl"></i>
    </a>
@endif
<div class="fixed bottom-24 right-6 z-50 flex items-center gap-2">
    <span class="px-3 py-1.5 bg-white text-primary-800 text-xs font-semibold rounded-full border border-primary-100 shadow-lg">
        Website dalam pengembangan
    </span>
    <button type="button"
            @click="developmentInfoOpen = true"
            aria-label="Informasi website dalam pengembangan"
            class="w-12 h-12 bg-primary-700 hover:bg-primary-800 text-white rounded-full shadow-lg flex items-center justify-center transition">
        <i class="fa-solid fa-circle-info text-xl"></i>
    </button>
</div>

<button id="btnTop"
        onclick="window.scrollTo({top:0,behavior:'smooth'})"
        class="fixed bottom-44 right-6 w-12 h-12 bg-primary-600 hover:bg-primary-700 text-white rounded-full shadow-lg flex items-center justify-center transition z-50 opacity-0 translate-y-4 pointer-events-none">
    <i class="fa-solid fa-arrow-up"></i>
</button>
<div x-show="developmentInfoOpen"
     x-cloak
     @keydown.escape.window="developmentInfoOpen = false"
     class="fixed inset-0 z-[70] flex items-center justify-center p-4"
     x-transition.opacity>
    <div class="absolute inset-0 bg-black/50" @click="developmentInfoOpen = false"></div>
    <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-2xl overflow-hidden" x-transition.scale>
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h3 class="text-lg font-bold text-neutral-900">Informasi Disclaimer</h3>
            <button type="button"
                    @click="developmentInfoOpen = false"
                    class="text-gray-400 hover:text-gray-600 transition"
                    aria-label="Tutup modal disclaimer">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
        <div class="px-6 py-5">
            <p class="text-neutral-700 leading-relaxed">
                Ini merupakan tampilan website baru dari YALI Papua. Konten teks, gambar, dan video masih dalam tahap pengembangan.
            </p>
            <p class="mt-4 text-sm text-neutral-500">
                Powered by
                <a href="https://nokensoft.com"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="text-primary-700 hover:text-primary-800 underline font-semibold">
                    Nokensoft.com
                </a>
            </p>
        </div>
        <div class="px-6 pb-6">
            <button type="button"
                    @click="developmentInfoOpen = false"
                    class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-primary-700 hover:bg-primary-800 text-white font-semibold rounded-lg transition">
                Tutup
            </button>
        </div>
    </div>
</div>

<footer class="bg-primary-950 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('img/logo-yali-papua.png') }}" alt="{{ $situs['nama_situs'] ?? 'YALI Papua' }}" class="h-10 w-auto brightness-0 invert" />
                    <span class="text-xl font-bold text-white">{{ $situs['nama_situs'] ?? 'YALI Papua' }}</span>
                </div>
                <p class="text-sm leading-relaxed mb-6">{{ $situs['deskripsi_situs'] ?? 'Yayasan Lingkungan Hidup Papua — berdedikasi untuk pelestarian alam dan pemberdayaan masyarakat adat di tanah Papua.' }}</p>
                @if (!empty($situs['telepon']))
                    <p class="text-sm text-gray-400 mb-6"><i class="fa-solid fa-phone mr-2"></i> {{ $situs['telepon'] }}</p>
                @endif
                <div class="flex gap-3">
                    @if (!empty($situs['sosmed_facebook']))
                        <a href="{{ $situs['sosmed_facebook'] }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-white/10 hover:bg-primary-600 rounded-lg flex items-center justify-center transition"><i class="fa-brands fa-facebook-f text-sm"></i></a>
                    @endif
                    @if (!empty($situs['sosmed_instagram']))
                        <a href="{{ $situs['sosmed_instagram'] }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-white/10 hover:bg-primary-600 rounded-lg flex items-center justify-center transition"><i class="fa-brands fa-instagram text-sm"></i></a>
                    @endif
                    @if (!empty($situs['sosmed_twitter']))
                        <a href="{{ $situs['sosmed_twitter'] }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-white/10 hover:bg-primary-600 rounded-lg flex items-center justify-center transition"><i class="fa-brands fa-x-twitter text-sm"></i></a>
                    @endif
                    @if (!empty($situs['sosmed_youtube']))
                        <a href="{{ $situs['sosmed_youtube'] }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 bg-white/10 hover:bg-primary-600 rounded-lg flex items-center justify-center transition"><i class="fa-brands fa-youtube text-sm"></i></a>
                    @endif
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Navigasi</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('beranda') }}" class="hover:text-primary-400 transition">Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="hover:text-primary-400 transition">Tentang Kami</a></li>
                    <li><a href="{{ route('program') }}" class="hover:text-primary-400 transition">Yang Kami Lakukan</a></li>
                    <li><a href="{{ route('mitra') }}" class="hover:text-primary-400 transition">Mitra</a></li>
                    <li><a href="{{ route('blog') }}" class="hover:text-primary-400 transition">Blog</a></li>
                    <li><a href="{{ route('foto-bercerita') }}" class="hover:text-primary-400 transition">Foto Bercerita</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Lainnya</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('donasi') }}" class="hover:text-primary-400 transition">Donasi</a></li>
                    <li><a href="{{ route('beranda') }}#cendera-mata" class="hover:text-primary-400 transition">Cendera Mata</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-primary-400 transition">FAQ</a></li>
                    <li><a href="{{ route('peta-situs') }}" class="hover:text-primary-400 transition">Peta Situs</a></li>
                    <li><a href="{{ route('kontak') }}" class="hover:text-primary-400 transition">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4">Dukung Gerakan Kami</h4>
                <p class="text-sm mb-4">Setiap kontribusi Anda membantu menjaga alam Papua dan menguatkan masyarakat adat.</p>
                <a href="{{ route('donasi') }}" class="inline-flex items-center px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-full transition text-sm shadow-md">
                    <i class="fa-solid fa-heart mr-2"></i> Donasi Sekarang
                </a>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-sm text-gray-400">&copy; {{ date('Y') }} {{ $situs['nama_situs'] ?? 'YALI Papua' }}. All right reserved.</p>
            <div class="flex items-center gap-3">
                <a href="{{ $footerAccountUrl }}"
                   class="inline-flex items-center px-4 py-1.5 rounded-full border border-white/20 text-sm text-gray-200 hover:text-white hover:border-primary-400 hover:bg-white/10 transition">
                    <i class="fa-solid {{ $sessionUser ? 'fa-user' : 'fa-right-to-bracket' }} mr-2"></i>
                    <span>{{ $footerAccountLabel }}</span>
                </a>
                <p class="text-sm text-gray-400">Powered by <a href="https://nokensoft.com" target="_blank" class="text-primary-400 hover:text-primary-300 transition">Nokensoft.com</a></p>
            </div>
        </div>
    </div>
</footer>
</div>
