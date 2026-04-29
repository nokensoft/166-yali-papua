@php
    $searchAction = $searchAction ?? route('berita');
    $kategoriAktif = $kategoriAktif ?? null;
    $isSemuaBeritaActive = $isSemuaBeritaActive ?? empty($kategoriAktif);
@endphp

<div class="space-y-6 order-2 lg:order-1 lg:sticky lg:top-24 lg:self-start">
    <div class="bg-neutral-50 p-6 rounded-lg">
        <h4 class="font-display font-bold text-lg uppercase mb-4 pb-3 border-b-2 border-secondary">Cari</h4>
        <form method="GET" action="{{ $searchAction }}">
            <div class="relative">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Tulis kata kunci..."
                       class="w-full border border-neutral-300 p-3 pr-10 text-lg focus:border-secondary focus:outline-none transition">
                <button type="submit" class="absolute right-0 top-0 h-full px-3 text-neutral-400 hover:text-secondary transition">
                    <i class="fa-solid fa-search text-lg"></i>
                </button>
            </div>
        </form>
    </div>

    @if (isset($kategoriList) && $kategoriList->count())
        <div class="bg-neutral-50 p-6 rounded-lg">
            <h4 class="font-display font-bold text-lg uppercase mb-4 pb-3 border-b-2 border-secondary">Kategori</h4>
            <ul class="space-y-1">
                @foreach ($kategoriList as $kat)
                    @if ($kat->slug)
                        <li>
                            <a href="{{ route('berita.kategori', $kat->slug) }}"
                               class="flex justify-between items-center py-2 text-lg hover:text-secondary transition {{ $kategoriAktif && $kategoriAktif->id === $kat->id ? 'text-secondary font-semibold' : 'text-neutral-600' }}">
                                <span>{{ $kat->nama }}</span>
                                <span class="bg-neutral-200 text-neutral-600 text-lg px-2 py-0.5 font-bold">{{ $kat->berita_count }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif


    <a href="{{ route('beranda') }}"
       class="{{ $isSemuaBeritaActive ? 'bg-secondary' : 'bg-neutral-800' }} text-white p-4 block hover:bg-secondary transition text-center">
        <span class="font-semibold text-lg uppercase">Kembali ke Beranda</span>
    </a>
</div>
