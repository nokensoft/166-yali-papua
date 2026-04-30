@php
    $searchAction = $searchAction ?? route('blog');
    $kategoriAktif = $kategoriAktif ?? null;
    $isSemuaBlogActive = $isSemuaBlogActive ?? empty($kategoriAktif);
    $blogPopuler = $blogPopuler ?? collect();
@endphp

<aside class="lg:col-span-1 space-y-8">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">
            <i class="fa-solid fa-magnifying-glass text-primary-600 mr-2"></i>Pencarian
        </h3>
        <form method="GET" action="{{ $searchAction }}" class="relative">
            <input type="text"
                   name="cari"
                   value="{{ request('cari') }}"
                   placeholder="Cari postingan..."
                   class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-primary-500 focus:ring-2 focus:ring-primary-200 outline-none transition text-sm" />
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
        </form>
    </div>

    @if (isset($kategoriList) && $kategoriList->count())
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">
                <i class="fa-solid fa-folder text-primary-600 mr-2"></i>Kategori
            </h3>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('blog') }}"
                       class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl text-sm transition {{ $isSemuaBlogActive ? 'bg-primary-50 text-primary-700 font-semibold' : 'text-gray-600 hover:bg-gray-50' }}">
                        <span><i class="fa-solid fa-layer-group mr-2"></i>Semua Blog</span>
                        <span class="bg-gray-100 text-gray-600 text-xs font-bold px-2 py-0.5 rounded-full">{{ $kategoriList->sum('blog_count') }}</span>
                    </a>
                </li>
                @foreach ($kategoriList as $kat)
                    @if ($kat->slug)
                        <li>
                            <a href="{{ route('blog.kategori', $kat->slug) }}"
                               class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl text-sm transition {{ $kategoriAktif && $kategoriAktif->id === $kat->id ? 'bg-primary-50 text-primary-700 font-semibold' : 'text-gray-600 hover:bg-gray-50' }}">
                                <span>{{ $kat->nama }}</span>
                                <span class="bg-gray-100 text-gray-600 text-xs font-bold px-2 py-0.5 rounded-full">{{ $kat->blog_count }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

    @if ($blogPopuler->count())
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">
                <i class="fa-solid fa-fire text-primary-600 mr-2"></i>Populer
            </h3>
            <div class="space-y-4">
                @foreach ($blogPopuler as $item)
                    <a href="{{ route('blog.detail', $item->slug) }}" class="flex gap-3 group">
                        <div class="w-16 h-16 rounded-xl flex-shrink-0 overflow-hidden bg-gradient-to-br from-primary-100 to-secondary-100">
                            <img src="{{ $item->gambar }}" alt="{{ $item->judul }}" class="w-full h-full object-cover" />
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-sm font-semibold text-gray-900 line-clamp-2 group-hover:text-primary-700 transition">{{ $item->judul }}</h4>
                            <span class="text-xs text-gray-400">{{ $item->tanggal_terbit?->translatedFormat('d M Y') ?? $item->created_at->translatedFormat('d M Y') }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <div class="bg-gradient-to-br from-primary-600 to-secondary-700 rounded-2xl p-6 text-white text-center">
        <i class="fa-solid fa-heart text-4xl mb-4 opacity-80"></i>
        <h3 class="text-lg font-bold mb-2">Dukung Kami</h3>
        <p class="text-sm text-gray-200 mb-4">Bantu YALI Papua menjaga kelestarian alam untuk generasi mendatang.</p>
        <a href="{{ route('donasi') }}"
           class="inline-flex items-center px-6 py-2.5 bg-white text-primary-700 font-bold rounded-full hover:bg-primary-50 transition text-sm shadow-md">
            <i class="fa-solid fa-heart mr-2"></i> Donasi
        </a>
    </div>
</aside>
