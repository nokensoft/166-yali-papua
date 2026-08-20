@extends('layouts.visitor')
@section('title', 'Donasi - ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-title', 'Donasi untuk ' . ($situs['nama_situs'] ?? 'YALI Papua'))
@section('seo-description', 'Informasi donasi untuk mendukung program masyarakat adat Papua melalui transfer rekening resmi dan FAQ donasi.')

@section('json-ld')
<script type="application/ld+json">{!! json_encode(['@context'=>'https://schema.org','@type'=>'BreadcrumbList','itemListElement'=>[['@type'=>'ListItem','position'=>1,'name'=>'Beranda','item'=>route('beranda')],['@type'=>'ListItem','position'=>2,'name'=>'Donasi']]], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    @php
        $rekeningBni = '1234xxxx';
        $rekeningMandiri = '154-00-7637607-2';
        $atasNama = 'Yayasan Lingkungan Hidup Papua';
    @endphp

    @include('partials.page-banner', [
        'title' => 'Donasi',
        'breadcrumb' => 'Donasi',
    ])

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-10 fade-in">
                    <p class="text-lg font-semibold tracking-widest uppercase text-primary-700 mb-2"><i class="fa-solid fa-heart mr-2"></i>Dukung Gerakan Kami</p>
                    <h2 class="text-2xl md:text-3xl font-display font-bold text-neutral-900">Informasi Donasi</h2>
                    <p class="text-neutral-500 mt-3">Donasi saat ini dilakukan melalui transfer ke rekening resmi berikut.</p>
                </div>
                <div class="mb-8 fade-in">
                    <h3 class="text-xl font-display font-bold text-neutral-900 mb-3">Pilihan Nominal Donasi</h3>
                    <p class="text-neutral-500 mb-6">Pilih salah satu nominal berikut atau gunakan opsi jumlah lain sesuai kemampuan Anda.</p>
                    <x-visitor.donation-options />
                </div>

                <div class="bg-white border border-neutral-200 shadow-card rounded-lg p-8 mb-8 fade-in">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary-100 text-primary-700 flex items-center justify-center rounded-md shrink-0">
                            <i class="fa-solid fa-building-columns text-xl"></i>
                        </div>
                        <div class="min-w-0">
                            <p class="text-lg font-semibold tracking-widest uppercase text-primary-700 mb-1">Rekening Donasi Resmi</p>
                            <h3 class="text-xl font-display font-bold text-neutral-900 mb-3">Bank Mandiri</h3>
                            <div class="bg-neutral-50 border border-neutral-200 rounded-md p-4">
                                <p class="text-lg text-neutral-500 mb-1">Nomor Rekening</p>
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                                    <p id="rekeningNumber" class="font-mono font-bold text-2xl text-neutral-900 tracking-wide">{{ $rekeningMandiri }}</p>
                                    <button type="button" id="copyRekeningButton"
                                            class="inline-flex items-center justify-center px-4 py-2 bg-primary-700 text-white text-sm font-semibold rounded-md hover:bg-primary-800 transition">
                                        <i class="fa-regular fa-copy mr-2"></i>
                                        <span id="copyRekeningLabel">Copy</span>
                                    </button>
                                </div>
                                <p id="copyRekeningFeedback" class="text-sm text-emerald-700 mt-2 hidden"></p>
                                <p class="text-lg text-neutral-500 mt-2">Atas Nama: <span class="font-semibold text-neutral-800">{{ $atasNama }}</span></p>
                                <p class="text-lg text-neutral-500 mt-2">Swift Bank: : <span class="font-semibold text-neutral-800">BMRIIDJA</span></p>
                            </div>
                            <p class="text-lg text-neutral-500 mt-4">Jika sudah transfer, silakan simpan bukti transfer dan hubungi admin melalui halaman kontak untuk konfirmasi manual.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral-50 border border-neutral-200 rounded-lg p-8 fade-in">
                    <h3 class="text-xl font-display font-bold text-neutral-900 mb-6">FAQ Donasi</h3>
                    <div class="space-y-3">
                        <details class="bg-white border border-neutral-200 rounded-md p-4 group" open>
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>1. Bagaimana cara berdonasi?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Lakukan transfer ke rekening donasi resmi yang tercantum di atas. Sertakan nama pengirim agar mudah diverifikasi.</p>
                        </details>

                        <details class="bg-white border border-neutral-200 rounded-md p-4 group">
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>2. Apakah donasi bisa anonim?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Bisa. Saat konfirmasi manual ke admin, Anda dapat menyampaikan bahwa donasi ingin ditampilkan sebagai anonim.</p>
                        </details>

                        <details class="bg-white border border-neutral-200 rounded-md p-4 group">
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>3. Apakah ada nominal minimum donasi?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Tidak ada nominal minimum. Setiap kontribusi sangat berarti untuk mendukung program pemberdayaan masyarakat adat Papua.</p>
                        </details>

                        <details class="bg-white border border-neutral-200 rounded-md p-4 group">
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>4. Bagaimana cara konfirmasi setelah transfer?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Siapkan bukti transfer lalu kirimkan melalui kanal komunikasi resmi di halaman <a href="{{ route('kontak') }}" class="text-primary-700 underline font-semibold">Kontak</a>.</p>
                        </details>

                        <details class="bg-white border border-neutral-200 rounded-md p-4 group">
                            <summary class="font-semibold text-neutral-900 cursor-pointer list-none flex items-center justify-between">
                                <span>5. Untuk apa donasi digunakan?</span>
                                <i class="fa-solid fa-chevron-down text-neutral-400 group-open:rotate-180 transition-transform"></i>
                            </summary>
                            <p class="text-neutral-600 mt-3">Donasi digunakan untuk mendukung kegiatan edukasi, penguatan kelembagaan adat, dan program pemberdayaan masyarakat sesuai misi organisasi.</p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const copyButton = document.getElementById('copyRekeningButton');
            if (!copyButton) return;

            const rekening = @json($rekeningBni);
            const feedback = document.getElementById('copyRekeningFeedback');
            const label = document.getElementById('copyRekeningLabel');
            let feedbackTimeout;

            const showFeedback = (message, isSuccess = true) => {
                if (!feedback) return;
                feedback.textContent = message;
                feedback.classList.remove('hidden', 'text-emerald-700', 'text-red-600');
                feedback.classList.add(isSuccess ? 'text-emerald-700' : 'text-red-600');
                clearTimeout(feedbackTimeout);
                feedbackTimeout = setTimeout(() => {
                    feedback.classList.add('hidden');
                }, 2000);
            };

            copyButton.addEventListener('click', async () => {
                try {
                    if (navigator.clipboard && window.isSecureContext) {
                        await navigator.clipboard.writeText(rekening);
                    } else {
                        const textArea = document.createElement('textarea');
                        textArea.value = rekening;
                        textArea.style.position = 'fixed';
                        textArea.style.opacity = '0';
                        document.body.appendChild(textArea);
                        textArea.focus();
                        textArea.select();
                        document.execCommand('copy');
                        textArea.remove();
                    }

                    if (label) label.textContent = 'Tersalin';
                    showFeedback('Nomor rekening berhasil disalin.');
                } catch (error) {
                    if (label) label.textContent = 'Gagal';
                    showFeedback('Gagal menyalin nomor rekening.', false);
                } finally {
                    setTimeout(() => {
                        if (label) label.textContent = 'Copy';
                    }, 2000);
                }
            });
        });
    </script>
@endsection
