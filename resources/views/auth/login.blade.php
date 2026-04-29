<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ $situs['nama_situs'] ?? 'YALI Papua' }}</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/png" href="{{ asset('img/logo-yali-papua.png') }}">
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: {
                    primary: { 50:'#f0f7f2',100:'#d9ede0',200:'#b4dbc3',300:'#82c19e',400:'#4fa174',500:'#2d8057',600:'#1f6642',700:'#1a5236',800:'#163f2b',900:'#0f2b1d',DEFAULT:'#2d8057' },
                    dark: '#1A1A1A'
                },
                fontFamily: {
                    sans: ['Lato','ui-sans-serif','system-ui','sans-serif'],
                    display: ['Lato','ui-sans-serif','system-ui','sans-serif']
                }
            }}
        }
    </script>
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    {{-- Font Awesome 6 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Lato', sans-serif; }
        h1, h2, h3, .font-display { font-family: 'Lato', sans-serif; }
        [x-cloak] { display: none !important; }
        .no-round { border-radius: 0.5rem; }
    </style>
</head>
<body class="bg-dark min-h-screen flex items-center justify-center font-sans text-lg p-4">

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <img src="{{ asset('img/logo-yali-papua.png') }}" alt="Logo {{ $situs['nama_situs'] ?? 'YALI Papua' }}" class="h-20 mx-auto mb-4 brightness-200">
            <h1 class="text-2xl font-extrabold text-white uppercase tracking-wide">{{ $situs['nama_situs'] ?? 'YALI Papua' }}</h1>
            <p class="text-gray-400 text-lg mt-1">Masuk ke Dashboard</p>
        </div>

        {{-- Login Form --}}
        <div class="bg-white p-8 shadow-2xl">
            @if (session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 text-lg">
                    <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 text-lg">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="text-lg font-bold uppercase text-gray-500 block mb-2">Email</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full border border-gray-300 p-4 pl-12 text-lg focus:border-primary focus:outline-none transition no-round"
                               placeholder="Masukkan email">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-lg mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="text-lg font-bold uppercase text-gray-500 block mb-2">Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"><i class="fas fa-lock"></i></span>
                        <input :type="show ? 'text' : 'password'" name="password" required
                               class="w-full border border-gray-300 p-4 pl-12 pr-12 text-lg focus:border-primary focus:outline-none transition no-round"
                               placeholder="Masukkan password">
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary">
                            <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-lg mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-primary text-white py-4 font-bold hover:bg-red-700 transition uppercase text-lg tracking-wide no-round">
                    <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('beranda') }}" class="text-lg text-gray-400 hover:text-primary transition">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Website
                </a>
            </div>
        </div>

        <p class="text-center text-lg text-gray-600 mt-6">&copy; {{ date('Y') }} {{ $situs['nama_situs'] ?? 'YALI Papua' }}</p>
    </div>

</body>
</html>
