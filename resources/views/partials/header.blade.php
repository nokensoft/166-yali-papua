<nav class="bg-white shadow-md sticky top-0 z-50" x-data="{ mobileMenu: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('beranda') }}" class="flex items-center gap-3">
                <img src="{{ asset('img/logo-yali-papua.png') }}" alt="{{ $situs['nama_situs'] ?? 'YALI Papua' }}" class="h-12 w-auto" />
                <div>
                    <span class="text-xl font-bold text-primary-800 leading-tight block">{{ $situs['nama_situs'] ?? 'YALI Papua' }}</span>
                    <span class="text-xs text-gray-500 leading-tight">Yayasan Lingkungan Hidup Papua</span>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ route('beranda') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('beranda') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition' }}">Beranda</a>
                <a href="{{ route('profil') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('profil') || request()->routeIs('sejarah') || request()->routeIs('kepengurusan') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition' }}">Tentang Kami</a>
                <a href="{{ route('program') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('program') || request()->routeIs('pilar-kerja') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition' }}">Yang Kami Lakukan</a>
                <a href="{{ route('mitra') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('mitra') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition' }}">Mitra</a>
                <a href="{{ route('blog') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('blog*') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition' }}">Blog</a>
                <a href="{{ route('foto-bercerita') }}" class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('foto-bercerita*') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:text-primary-700 hover:bg-primary-50 transition' }}">Foto Bercerita</a>
                <a href="{{ route('kontak') }}" class="ml-3 px-5 py-2.5 bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold rounded-full transition shadow-md"><i class="fa-solid fa-envelope mr-1"></i> Kontak</a>
            </div>

            <button @click="mobileMenu = !mobileMenu" class="lg:hidden text-gray-700 text-2xl">
                <i :class="mobileMenu ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"></i>
            </button>
        </div>
    </div>

    <div x-show="mobileMenu" x-cloak x-transition class="lg:hidden bg-white border-t shadow-lg">
        <div class="px-4 py-4 space-y-1">
            <a @click="mobileMenu=false" href="{{ route('beranda') }}" class="block px-3 py-2.5 rounded-md font-medium {{ request()->routeIs('beranda') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' }}">Beranda</a>
            <a @click="mobileMenu=false" href="{{ route('profil') }}" class="block px-3 py-2.5 rounded-md font-medium {{ request()->routeIs('profil') || request()->routeIs('sejarah') || request()->routeIs('kepengurusan') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' }}">Tentang Kami</a>
            <a @click="mobileMenu=false" href="{{ route('program') }}" class="block px-3 py-2.5 rounded-md font-medium {{ request()->routeIs('program') || request()->routeIs('pilar-kerja') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' }}">Yang Kami Lakukan</a>
            <a @click="mobileMenu=false" href="{{ route('mitra') }}" class="block px-3 py-2.5 rounded-md font-medium {{ request()->routeIs('mitra') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' }}">Mitra</a>
            <a @click="mobileMenu=false" href="{{ route('blog') }}" class="block px-3 py-2.5 rounded-md font-medium {{ request()->routeIs('blog*') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' }}">Blog</a>
            <a @click="mobileMenu=false" href="{{ route('foto-bercerita') }}" class="block px-3 py-2.5 rounded-md font-medium {{ request()->routeIs('foto-bercerita*') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' }}">Foto Bercerita</a>
            <a @click="mobileMenu=false" href="{{ route('kontak') }}" class="block px-3 py-2.5 rounded-md font-medium {{ request()->routeIs('kontak') ? 'text-primary-700 bg-primary-50' : 'text-gray-700 hover:bg-primary-50 hover:text-primary-700' }}">Kontak</a>

            <div class="border-t border-gray-100 mt-2 pt-2 space-y-1">
                <a @click="mobileMenu=false" href="{{ route('donasi') }}" class="block px-3 py-2.5 rounded-md text-gray-700 hover:bg-primary-50 hover:text-primary-700 font-medium"><i class="fa-solid fa-heart mr-2 text-primary-600"></i>Donasi</a>
                <a @click="mobileMenu=false" href="{{ route('beranda') }}#cendera-mata" class="block px-3 py-2.5 rounded-md text-gray-700 hover:bg-primary-50 hover:text-primary-700 font-medium"><i class="fa-solid fa-gift mr-2 text-primary-600"></i>Cendera Mata</a>
                <a @click="mobileMenu=false" href="{{ route('faq') }}" class="block px-3 py-2.5 rounded-md text-gray-700 hover:bg-primary-50 hover:text-primary-700 font-medium"><i class="fa-solid fa-circle-question mr-2 text-primary-600"></i>FAQ</a>
            </div>
        </div>
    </div>
</nav>
