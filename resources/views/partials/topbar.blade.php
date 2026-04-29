<div class="bg-primary-900 text-white text-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-col sm:flex-row justify-between items-center gap-2">
        <div class="flex items-center gap-4">
            @if (!empty($situs['email']))
                <span><i class="fa-solid fa-envelope mr-1"></i> {{ $situs['email'] }}</span>
            @endif
            @if (!empty($situs['telepon']))
                <span><i class="fa-solid fa-phone mr-1"></i> {{ $situs['telepon'] }}</span>
            @endif
        </div>
        <div class="flex items-center gap-4">
            <div class="hidden sm:flex items-center gap-3 text-xs">
                <a href="{{ route('donasi') }}" class="hover:text-primary-300 transition font-medium">Donasi</a>
                <span class="text-white/30">|</span>
                <a href="{{ route('beranda') }}#cendera-mata" class="hover:text-primary-300 transition font-medium">Cendera Mata</a>
                <span class="text-white/30">|</span>
                <a href="{{ route('faq') }}" class="hover:text-primary-300 transition font-medium">FAQ</a>
            </div>
            <div class="flex items-center gap-3 sm:ml-4 sm:pl-4 sm:border-l sm:border-white/20">
                @if (!empty($situs['sosmed_facebook']))
                    <a href="{{ $situs['sosmed_facebook'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-primary-300 transition"><i class="fa-brands fa-facebook-f"></i></a>
                @endif
                @if (!empty($situs['sosmed_instagram']))
                    <a href="{{ $situs['sosmed_instagram'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-primary-300 transition"><i class="fa-brands fa-instagram"></i></a>
                @endif
                @if (!empty($situs['sosmed_twitter']))
                    <a href="{{ $situs['sosmed_twitter'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-primary-300 transition"><i class="fa-brands fa-x-twitter"></i></a>
                @endif
                @if (!empty($situs['sosmed_youtube']))
                    <a href="{{ $situs['sosmed_youtube'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-primary-300 transition"><i class="fa-brands fa-youtube"></i></a>
                @endif
            </div>
        </div>
    </div>
</div>
