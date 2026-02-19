<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PujiFarm - Ternak & Unggas</title>
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🐔</text></svg>">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Animated Underline Navbar */
        .nav-link {
            position: relative;
            display: inline-block;
            padding-bottom: 4px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #10b981, #059669);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
            border-radius: 2px;
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }

        /* Floating animations - subtle & smooth */
        @keyframes float-slow {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-8px) rotate(2deg);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-6px) scale(1.03);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.4;
            }

            50% {
                opacity: 0.7;
            }
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.15);
            }
        }

        .animate-float-slow {
            animation: float-slow 5s ease-in-out infinite;
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }

        .animate-bounce-slow {
            animation: bounce-slow 2s ease-in-out infinite;
        }

        /* Disable hover animations on mobile */
        @media (max-width: 1023px) {
            .card-hover:hover {
                transform: none !important;
                box-shadow: none !important;
            }

            .btn-premium:hover {
                transform: none !important;
                box-shadow: none !important;
            }
        }

        .nav-link.active::after {
            transform: scaleX(1);
        }

        /* Subtle animations */
        .fade-in-up {
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-6px) scale(1.01);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        /* Card hover lift */
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
        }

        /* Button hover effect */
        .btn-premium {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px -8px rgba(124, 58, 237, 0.35);
        }

        /* Image zoom on hover */
        .img-zoom {
            transition: transform 0.4s ease;
        }

        .group:hover .img-zoom {
            transform: scale(1.04);
        }

        /* Line clamp for descriptions */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @keyframes retro-progress {
            0% {
                width: 0%;
            }

            100% {
                width: 100%;
            }
        }

        .animate-retro-progress {
            animation: retro-progress 1.5s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    <!-- Navbar - STICKY dengan Animated Underline -->
    <nav class="bg-white/95 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto px-4 sm:px-6 py-4">
            <div class="flex items-center justify-between">

                <!-- Logo -->
                <a href="{{ route('home') }}"
                    class="text-xl sm:text-2xl font-bold text-gray-900 hover:text-emerald-600 transition-colors">
                    PujiFarm
                </a>

                <!-- Desktop Menu (Centered) -->
                <div class="hidden md:flex gap-8 text-sm font-medium absolute left-1/2 -translate-x-1/2">
                    <a href="{{ route('home') }}"
                        class="nav-link text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('home') ? 'active text-emerald-600 font-semibold' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}"
                        class="nav-link text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('about') ? 'active text-emerald-600 font-semibold' : '' }}">
                        Tentang Kami
                    </a>
                    <a href="{{ route('catalog') }}"
                        class="nav-link text-gray-600 hover:text-emerald-600 transition-colors {{ request()->routeIs('catalog') ? 'active text-emerald-600 font-semibold' : '' }}">
                        Produk
                    </a>
                </div>

                <!-- Desktop CTA Button -->
                <a href="{{ route('catalog') }}"
                    class="hidden md:inline-block bg-emerald-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-emerald-700 transition-all btn-premium shadow-sm shadow-emerald-500/25">
                    Pesan Sekarang
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="md:hidden p-2 text-gray-600 hover:text-emerald-600 transition-colors"
                    type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="mobileMenu">
                    <!-- Hamburger Icon -->
                    <svg id="iconMenu" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close Icon (Hidden by default) -->
                    <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 border-t border-gray-100 pt-4 fade-in-up">
                <div class="flex flex-col gap-2">

                    <!-- Home -->
                    <a href="{{ route('home') }}"
                        class="px-4 py-3 rounded-xl transition-all font-medium flex items-center gap-2
                              {{ request()->routeIs('home') ? 'bg-emerald-100 text-emerald-700' : 'text-gray-600 hover:text-emerald-600 hover:bg-emerald-50' }}">
                        <span>🏠</span> Home
                    </a>

                    <!-- Tentang Kami -->
                    <a href="{{ route('about') }}"
                        class="px-4 py-3 rounded-xl transition-all font-medium flex items-center gap-2
                              {{ request()->routeIs('about') ? 'bg-emerald-100 text-emerald-700' : 'text-gray-600 hover:text-emerald-600 hover:bg-emerald-50' }}">
                        <span>ℹ️</span> Tentang Kami
                    </a>

                    <!-- Produk -->
                    <a href="{{ route('catalog') }}"
                        class="px-4 py-3 rounded-xl transition-all font-medium flex items-center gap-2
                              {{ request()->routeIs('catalog') ? 'bg-emerald-100 text-emerald-700' : 'text-gray-600 hover:text-emerald-600 hover:bg-emerald-50' }}">
                        <span>🛒</span> Produk
                    </a>

                    <!-- CTA Button -->
                    <a href="{{ route('catalog') }}"
                        class="mt-2 bg-emerald-600 text-white text-center px-4 py-3 rounded-xl font-semibold hover:bg-emerald-700 transition-all btn-premium">
                        💬 Pesan Sekarang
                    </a>

                </div>
            </div>
        </div>
    </nav>


    <header
        class="relative py-16 sm:py-24 bg-gradient-to-br from-white via-emerald-50/50 to-blue-50/50 overflow-hidden">

        <!-- Subtle Background Blobs -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-emerald-200/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-200/20 rounded-full blur-3xl animate-float"
                style="animation-delay: 1.5s;"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-10 lg:gap-16">

                <!-- LEFT CONTENT -->
                <div class="lg:w-1/2 text-center lg:text-left fade-in-up">

                    <!-- Headline -->
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-bold text-gray-900 leading-tight mb-6">
                        Dari Keluarga untuk Anda —
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-600">
                            PujiFarm</span>.
                    </h1>

                    <!-- Subheading -->
                    <p
                        class="text-gray-600 text-base sm:text-lg lg:text-xl mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Menghadirkan produk berkualitas melalui kombinasi pengalaman bertahun-tahun
                        dan teknologi modern untuk hasil yang lebih segar, konsisten, dan terpercaya.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-10 justify-center lg:justify-start">
                        <a href="{{ route('about') }}"
                            class="bg-emerald-600 text-white px-8 py-3.5 sm:px-10 sm:py-4 rounded-xl font-semibold 
                                  hover:bg-emerald-700 transition-all btn-premium shadow-lg shadow-emerald-500/25 text-center">
                            Tentang Kami
                        </a>

                        <a href="{{ route('catalog') }}" class="bg-white text-emerald-600 border-2 border-emerald-600 px-8 py-3.5 sm:px-10 sm:py-4 
                                  rounded-xl font-semibold hover:bg-emerald-50 transition-all text-center">
                            Lihat Produk
                        </a>
                    </div>

                    <!-- Trust Badges -->
                    <div
                        class="flex flex-col sm:flex-row items-center gap-5 sm:gap-8 text-sm text-gray-600 justify-center lg:justify-start">
                        <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse"></span>
                            <span>Siap melayani setiap hari</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-lg">📍</span>
                            <span class="text-xs sm:text-sm">Petanahan, Kebumen</span>
                        </div>
                    </div>
                </div>

                <!-- RIGHT VISUAL - Abstract Geometric Enhanced (Desktop Only) -->
                <div class="hidden lg:block lg:w-1/2">
                    <div
                        class="relative bg-white rounded-3xl shadow-xl border border-gray-100 p-8 card-hover h-[420px] flex items-center justify-center overflow-hidden">

                        <!-- Layer 1: Gradient Mesh -->
                        <div class="absolute inset-0 opacity-40">
                            <svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <radialGradient id="mesh1" cx="20%" cy="20%" r="80%">
                                        <stop offset="0%" stop-color="#10b981" stop-opacity="0.15" />
                                        <stop offset="100%" stop-color="#10b981" stop-opacity="0" />
                                    </radialGradient>
                                    <radialGradient id="mesh2" cx="80%" cy="80%" r="80%">
                                        <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.12" />
                                        <stop offset="100%" stop-color="#3b82f6" stop-opacity="0" />
                                    </radialGradient>
                                </defs>
                                <rect width="100%" height="100%" fill="url(#mesh1)" />
                                <rect width="100%" height="100%" fill="url(#mesh2)" />
                            </svg>
                        </div>

                        <!-- Layer 2: Subtle Grid Lines -->
                        <div class="absolute inset-0 opacity-20">
                            <svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <pattern id="grid" width="32" height="32" patternUnits="userSpaceOnUse">
                                        <path d="M 32 0 L 0 0 0 32" fill="none" stroke="#10b981" stroke-width="0.8" />
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" fill="url(#grid)" />
                            </svg>
                        </div>

                        <!-- Layer 3: Floating Animated Shapes -->
                        <div class="absolute inset-0 overflow-hidden pointer-events-none">
                            <div
                                class="absolute top-8 left-8 w-12 h-12 border border-emerald-300/50 rounded-xl animate-float-slow">
                            </div>
                            <div class="absolute bottom-12 right-10 w-8 h-8 bg-gradient-to-br from-blue-200/40 to-cyan-200/40 rounded-lg animate-float"
                                style="animation-delay: 1s;"></div>
                            <div class="absolute top-1/3 right-6 w-6 h-6 border-2 border-teal-300/40 rounded-full animate-float"
                                style="animation-delay: 2s;"></div>
                        </div>

                        <div class="relative z-10 text-center max-w-xs">

                            <!-- Icon Container with Glow -->
                            <div class="relative mx-auto mb-6">
                                <!-- Glow Effect -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-emerald-400/20 to-teal-400/20 rounded-2xl blur-xl animate-pulse-slow">
                                </div>

                                <!-- Main Icon -->
                                <div
                                    class="relative w-20 h-20 mx-auto bg-gradient-to-br from-emerald-100 to-teal-100 rounded-2xl flex items-center justify-center shadow-inner border border-emerald-200/50">
                                    <svg class="w-10 h-10 text-emerald-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>

                                <!-- Sparkle Badge -->
                                <div
                                    class="absolute -top-1 -right-1 w-5 h-5 bg-yellow-300 rounded-full flex items-center justify-center text-[10px] shadow-sm animate-bounce-slow">
                                    ✨
                                </div>
                            </div>

                            <!-- Headline -->
                            <h3 class="text-lg font-bold text-gray-900 mb-1.5">Kualitas dari Sumbernya</h3>
                            <p class="text-sm text-gray-500 mb-5 leading-relaxed">
                                Proses terkontrol dari kandang hingga ke tangan Anda
                            </p>

                            <!-- Feature List (Clean Typography) -->
                            <div class="space-y-2.5 text-left">
                                <div class="flex items-center gap-2.5 text-xs text-gray-600">
                                    <svg class="w-4 h-4 text-emerald-500 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Pakan mandiri terformulasi</span>
                                </div>
                                <div class="flex items-center gap-2.5 text-xs text-gray-600">
                                    <svg class="w-4 h-4 text-emerald-500 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Kandang dengan ventilasi optimal</span>
                                </div>
                                <div class="flex items-center gap-2.5 text-xs text-gray-600">
                                    <svg class="w-4 h-4 text-emerald-500 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>Quality check sebelum pengiriman</span>
                                </div>
                            </div>

                        </div>

                        <!-- Top Right: Trust Badge -->
                        <div
                            class="absolute top-5 right-5 bg-white/90 backdrop-blur-sm rounded-xl px-3 py-2 shadow-lg border border-gray-100">
                            <div class="flex items-center gap-2">
                                <div class="flex text-yellow-400 text-xs">★★★★★</div>
                                <span class="text-[10px] font-medium text-gray-600">4.9/5</span>
                            </div>
                        </div>
                        <!-- Decorative Border Glow (Animated) -->
                        <div class="absolute inset-0 rounded-3xl border-2 border-transparent bg-gradient-to-r from-emerald-400/0 via-emerald-400/20 to-teal-400/0 opacity-0 hover:opacity-100 transition-opacity duration-500 pointer-events-none"
                            style="mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0); mask-composite: exclude; padding: 2px;">
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </header>


    <!-- HIGHLIGHT PRODUCTS SECTION -->
    <section id="produk" class="py-16 sm:py-24 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">

            <!-- Section Header -->
            <div class="text-center mb-12 sm:mb-16">
                <span
                    class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full mb-4">
                    Pilihan Terbaik
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    🔥 Produk Populer
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">
                    Pilihan terbaik dari produk kami dengan kualitas terjamin
                </p>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($highlights as $item)
                    <div
                        class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 
                                                                                overflow-hidden border border-gray-200 card-hover fade-in-up">

                        <!-- Image Container -->
                        <div class="overflow-hidden h-48 sm:h-64 bg-gray-100 relative">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="w-full h-full object-cover img-zoom">
                            @else
                                <div
                                    class="w-full h-full flex items-center justify-center text-5xl sm:text-6xl text-gray-300 bg-gradient-to-br from-emerald-50 to-blue-50">
                                    📦
                                </div>
                            @endif

                            <!-- Badge -->
                            <span
                                class="absolute top-3 sm:top-4 left-3 sm:left-4 bg-emerald-600 text-white 
                                                                                       text-xs px-3 py-1.5 rounded-full font-semibold shadow-sm">
                                Best Seller
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="p-5 sm:p-6">
                            <h3
                                class="font-bold text-lg sm:text-xl text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors">
                                {{ $item->name }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-5 line-clamp-2 leading-relaxed">
                                {{ $item->description }}
                            </p>

                            <!-- Price & Rating -->
                            <div class="flex items-center justify-between mb-5">
                                <span class="text-lg sm:text-2xl font-bold text-emerald-600">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </span>
                                <div class="flex items-center gap-1">
                                    <span class="text-yellow-400 text-sm">★★★★★</span>
                                </div>
                            </div>

                            <!-- WhatsApp Button -->
                            <a href="https://wa.me/{{ $waNumber }}?text=Halo, saya tertarik dengan {{ $item->name }}"
                                target="_blank"
                                class="block w-full bg-emerald-600 text-white text-center px-5 py-3 rounded-xl 
                                                                                      font-semibold hover:bg-emerald-700 transition-all btn-premium text-sm sm:text-base">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- CTA SECTION -->
    <section class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 text-center">

            <div class="max-w-3xl mx-auto">
                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-5 sm:mb-6">
                    Mau Lihat Semua Produk?
                </h3>
                <p class="text-gray-600 mb-8 sm:mb-10 text-sm sm:text-lg leading-relaxed">
                    Klik di bawah untuk buka katalog lengkap kami dengan produk pilihan berkualitas
                </p>

                <a href="{{ route('catalog') }}" class="inline-flex items-center gap-2 bg-emerald-600 text-white font-semibold 
                          px-10 py-4 rounded-xl shadow-lg shadow-emerald-500/25 
                          hover:bg-emerald-700 transition-all btn-premium text-base sm:text-lg">
                    Buka Katalog Lengkap
                    <span>→</span>
                </a>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white py-12 sm:py-16 border-t border-gray-800">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 sm:gap-12 text-sm">

                <!-- Brand -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold">PujiFarm</h3>
                    <p class="text-gray-400 leading-relaxed">
                        Peternakan mandiri dengan kandang sendiri dan pakan terkontrol,
                        menghadirkan produk segar, sehat, dan terpercaya langsung dari sumbernya.
                    </p>
                </div>

                <!-- Alamat -->
                <div class="space-y-4">
                    <h4 class="font-semibold text-white">Alamat</h4>
                    <p class="text-gray-400 leading-relaxed">
                        Jl. Armed RT 02 / RW 03<br>
                        Desa Kreweng, Kecamatan Petanahan<br>
                        Kabupaten Kebumen, Jawa Tengah 54382
                    </p>
                </div>

                <!-- Jam Operasional + Sosial Media -->
                <div class="space-y-4">
                    <div>
                        <h4 class="font-semibold text-white mb-2">Jam Operasional</h4>
                        <p class="text-gray-400">
                            Senin - Sabtu : 08.00 - 17.00<br>
                            Minggu : Libur
                        </p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-white mb-3">Sosial Media</h4>
                        <div class="flex gap-5">
                            <!-- Instagram -->
                            <a href="#" class="text-gray-400 hover:text-white transition-colors p-1"
                                aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                                </svg>
                            </a>

                            <!-- Facebook -->
                            <a href="#" class="text-gray-400 hover:text-white transition-colors p-1"
                                aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M22 12a10 10 0 10-11.5 9.9v-7h-2.3V12h2.3V9.8c0-2.3 1.4-3.6 3.5-3.6 1 0 2 .2 2 .2v2.2h-1.2c-1.2 0-1.6.7-1.6 1.5V12h2.7l-.4 2.9h-2.3v7A10 10 0 0022 12z" />
                                </svg>
                            </a>

                            <!-- TikTok -->
                            <a href="#" class="text-gray-400 hover:text-white transition-colors p-1"
                                aria-label="TikTok">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M16.5 3c.3 1.7 1.7 3.1 3.5 3.4v2.3c-1.4 0-2.7-.4-3.8-1.2v7.3a5 5 0 11-5-5c.3 0 .6 0 .9.1v2.5a2.5 2.5 0 102.5 2.5V3h1.9z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom -->
            <div class="border-t border-gray-800 mt-10 sm:mt-12 pt-6 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} PujiFarm. All rights reserved.
            </div>

        </div>
    </footer>


    <!-- JavaScript untuk Mobile Menu -->
    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconMenu = document.getElementById('iconMenu');
        const iconClose = document.getElementById('iconClose');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');

                // Toggle icons
                const isHidden = mobileMenu.classList.contains('hidden');
                iconMenu.classList.toggle('hidden', !isHidden);
                iconClose.classList.toggle('hidden', isHidden);
                mobileMenuBtn.setAttribute('aria-expanded', !isHidden);
            });

            // Close mobile menu when clicking a link
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    iconMenu.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                });
            });
            setTimeout(() => {
                document.getElementById('loadingScreen').style.display = 'none';
            }, 1500);
        }
    </script>

    <div id="loadingScreen" class="fixed inset-0 bg-white z-[9999] flex items-center justify-center">
        <div class="text-center">
            <p class="text-gray-900 font-mono text-sm mb-3 tracking-widest font-bold">LOADING</p>
            <div class="w-48 h-1 bg-gray-200 rounded-full overflow-hidden">
                <div class="h-full bg-gray-900 animate-retro-progress"></div>
            </div>
        </div>
    </div>

</body>

</html>