{{-- Hero Slider (Alpine.js) --}}
@php
    $bannerFiles = glob(public_path('banners/*.{jpg,jpeg,png,webp,avif,JPG,JPEG,PNG,WEBP,AVIF}'), GLOB_BRACE) ?: [];

    $slides = collect($bannerFiles)
        ->sort()
        ->values()
        ->map(function ($path) {
            $file = basename($path);

            return [
                'image' => asset('banners/' . $file),
                'alt'   => ucwords(str_replace(['-', '_'], ' ', pathinfo($file, PATHINFO_FILENAME))),
            ];
        })
        ->all();

    if (empty($slides)) {
        $slides = [
            [
                'image' => 'https://placehold.co/1920x1080',
                'alt'   => 'Hero Banner',
            ],
        ];
    }
@endphp

<section class="relative overflow-hidden bg-black" x-data="heroSlider()" x-init="startAutoplay()">
    <div class="relative hero-slider-frame">
        @foreach ($slides as $i => $slide)
            <div x-show="active === {{ $i }}"
                 x-transition:enter="transition-opacity ease-out duration-700"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-in duration-500"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0">
                <img src="{{ $slide['image'] }}"
                     alt="{{ $slide['alt'] }}"
                     class="absolute inset-0 w-full h-full object-cover object-center slider-zoom"
                     onerror="this.onerror=null;this.src='https://placehold.co/1920x1080'">
            </div>
        @endforeach
    </div>
</section>

<style>
.hero-slider-frame {
    height: 100svh;
    min-height: 420px;
}
@supports not (height: 100svh) {
    .hero-slider-frame {
        height: 100vh;
    }
}
@media (max-width: 768px) {
    .hero-slider-frame {
        min-height: 320px;
    }
}
@keyframes kenBurnsIn {
    0% { transform: scale(1); }
    100% { transform: scale(1.08); }
}
.slider-zoom {
    animation: kenBurnsIn 6s ease-in-out forwards;
}
</style>

<script>
function heroSlider() {
    return {
        active: 0,
        total: {{ count($slides) }},
        interval: null,
        startAutoplay() {
            if (this.total <= 1) return;
            this.stopAutoplay();
            this.interval = setInterval(() => this.next(), 5000);
        },
        stopAutoplay() {
            if (this.interval) {
                clearInterval(this.interval);
                this.interval = null;
            }
        },
        next() {
            if (this.total <= 1) return;
            this.active = (this.active + 1) % this.total;
        }
    };
}
</script>
