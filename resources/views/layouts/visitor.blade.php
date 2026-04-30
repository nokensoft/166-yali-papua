<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $seoTitle = View::yieldContent('seo-title', $situs['nama_situs'] ?? 'YALI Papua');
        $seoDesc = View::yieldContent('seo-description', $situs['seo_meta_description'] ?? '');
        $seoImage = View::yieldContent('seo-image', !empty($situs['seo_og_image']) ? asset('storage/' . $situs['seo_og_image']) : 'https://placehold.co/1200x630');
        $seoKeywords = $situs['seo_meta_keywords'] ?? '';
    @endphp

    <title>@yield('title', $seoTitle) — {{ $situs['nama_situs'] ?? 'YALI Papua' }}</title>
    <meta name="description" content="{{ $seoDesc }}">
    <meta name="keywords" content="{{ $seoKeywords }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    {{-- Open Graph --}}
    <meta property="og:type" content="@yield('og-type', 'website')">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDesc }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $situs['nama_situs'] ?? 'YALI Papua' }}">
    <meta property="og:locale" content="id_ID">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDesc }}">
    <meta name="twitter:image" content="{{ $seoImage }}">

    {{-- JSON-LD: Organization --}}
    @php
        $orgSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $situs['nama_situs'] ?? 'YALI Papua',
            'url' => url('/'),
            'logo' => asset('img/logo-yali-papua.png'),
            'description' => $situs['seo_meta_description'] ?? 'Yayasan Lingkungan Hidup Papua',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Jayapura',
                'addressRegion' => 'Papua',
                'addressCountry' => 'ID',
            ],
        ];
        if (!empty($situs['email']) || !empty($situs['telepon'])) {
            $contact = ['@type' => 'ContactPoint', 'contactType' => 'customer service'];
            if (!empty($situs['telepon'])) $contact['telephone'] = $situs['telepon'];
            if (!empty($situs['email'])) $contact['email'] = $situs['email'];
            $orgSchema['contactPoint'] = $contact;
        }
        $socialLinks = collect(['sosmed_facebook','sosmed_instagram','sosmed_youtube','sosmed_twitter','sosmed_tiktok'])
            ->map(fn($key) => $situs[$key] ?? null)->filter()->values();
        if ($socialLinks->isNotEmpty()) {
            $orgSchema['sameAs'] = $socialLinks->toArray();
        }
    @endphp
    @php
        $webSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $situs['nama_situs'] ?? 'YALI Papua',
            'url' => url('/'),
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => url('/blog') . '?cari={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ];
        $jsonFlags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
    @endphp
    <script type="application/ld+json">{!! json_encode($orgSchema, $jsonFlags) !!}</script>
    <script type="application/ld+json">{!! json_encode($webSchema, $jsonFlags) !!}</script>

    {{-- JSON-LD: BreadcrumbList (dari child view) --}}
    @yield('json-ld')

    <link rel="icon" type="image/png" href="{{ asset('img/logo-yali-papua.png') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#15803d',
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            950: '#052e16',
                        },
                        secondary: {
                            DEFAULT: '#0284c7',
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                            950: '#082f49',
                        },
                        surface: '#ffffff',
                        accent: '#f3f4f6'
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                        display: ['Inter', 'system-ui', 'sans-serif'],
                    },
                    borderRadius: {
                        'none': '0',
                    }
                }
            }
        }
    </script>
    {{-- Font Awesome 6 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            font-size: 1.125rem;
            letter-spacing: -0.01em;
        }
        h1, h2, h3, .font-display { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        .no-rounded { border-radius: 0.5rem; }
        /* Nav link underline */
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; bottom: -4px; left: 0; width: 0; height: 2px; background: #15803d; transition: width .25s ease; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }
        /* Fade-in */
        .fade-in { opacity: 0; transform: translateY(20px); transition: opacity .5s ease, transform .5s ease; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }
        /* Card hover */
        .card-hover { transition: box-shadow .2s ease, transform .2s ease; }
        .card-hover:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.12); transform: translateY(-2px); }
        /* Visitor main animation */
        .visitor-main { animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        /* Page banner overlay */
        .page-banner::after { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(26,26,26,0.9) 0%, rgba(26,26,26,0.5) 100%); z-index: 1; }
        /* Line clamp */
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        /* Prose typography */
        .prose p { margin-bottom: 1.25rem; color: #374151; }
        .prose p:last-child { margin-bottom: 0; }
        .prose h2 { font-size: 1.5rem; font-weight: 800; margin-top: 2rem; margin-bottom: 0.75rem; color: #1A1A1A; }
        .prose h3 { font-size: 1.25rem; font-weight: 700; margin-top: 1.75rem; margin-bottom: 0.5rem; color: #1A1A1A; }
        .prose h4 { font-size: 1.125rem; font-weight: 700; margin-top: 1.5rem; margin-bottom: 0.5rem; color: #374151; }
        .prose a { color: #15803d; text-decoration: underline; }
        .prose a:hover { color: #166534; }
        .prose blockquote { border-left: 4px solid #15803d; padding-left: 1.25rem; margin: 1.5rem 0; color: #4b5563; font-style: italic; }
        .prose ul, .prose ol { padding-left: 1.5rem; margin-bottom: 1.25rem; }
        .prose ul { list-style-type: disc; }
        .prose ol { list-style-type: decimal; }
        .prose li { margin-bottom: 0.375rem; }
        .prose img { margin: 1.5rem 0; max-width: 100%; height: auto; }
        .prose table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
        .prose table td, .prose table th { border: 1px solid #d1d5db; padding: 0.625rem 0.875rem; }
        .prose table th { background: #f3f4f6; font-weight: 700; }
    </style>
</head>
<body class="bg-white text-gray-800 antialiased text-lg">

    {{-- Page Loading --}}
    @include('partials.page-loading')

    {{-- Topbar --}}
    @include('partials.topbar')

    {{-- Header --}}
    @include('partials.header')

    {{-- Main Content --}}
    <main class="visitor-main">
        @yield('content')
    </main>
    {{-- Global Visitor CTA --}}
    <x-visitor.join-cta />

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Fade-in + Back-to-top JS --}}
    <script>
        const _fadeObserver = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    _fadeObserver.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.fade-in').forEach(el => _fadeObserver.observe(el));
        });
        const _btnTop = document.getElementById('btnTop');
        if (_btnTop) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    _btnTop.classList.remove('opacity-0', 'translate-y-4', 'pointer-events-none');
                    _btnTop.classList.add('opacity-100', 'translate-y-0');
                } else {
                    _btnTop.classList.add('opacity-0', 'translate-y-4', 'pointer-events-none');
                    _btnTop.classList.remove('opacity-100', 'translate-y-0');
                }
            });
        }
    </script>

</body>
</html>
