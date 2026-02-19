<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - PujiFarm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * { font-family: 'Inter', sans-serif; }
        
        /* Smooth scroll */
        html { scroll-behavior: smooth; }
        
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
        .nav-link:hover::after { transform: scaleX(1); }
        .nav-link.active::after { transform: scaleX(1); }
        
        /* Subtle animations */
        .fade-in-up { animation: fadeInUp 0.5s ease-out; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-6px) scale(1.01); }
        }
        .animate-float { animation: float 4s ease-in-out infinite; }
        
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
            box-shadow: 0 12px 30px -8px rgba(16, 185, 129, 0.35);
        }
        
        /* Line clamp for descriptions */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
                <button id="mobileMenuBtn" 
                        class="md:hidden p-2 text-gray-600 hover:text-emerald-600 transition-colors" 
                        type="button" 
                        aria-label="Buka menu" 
                        aria-expanded="false" 
                        aria-controls="mobileMenu">
                    <svg id="iconMenu" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 border-t border-gray-100 pt-4 fade-in-up">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home') }}" 
                       class="px-4 py-3 rounded-xl transition-all font-medium flex items-center gap-2
                              {{ request()->routeIs('home') ? 'bg-emerald-100 text-emerald-700' : 'text-gray-600 hover:text-emerald-600 hover:bg-emerald-50' }}">
                        <span>🏠</span> Home
                    </a>
                    <a href="{{ route('about') }}" 
                       class="px-4 py-3 rounded-xl transition-all font-medium flex items-center gap-2
                              {{ request()->routeIs('about') ? 'bg-emerald-100 text-emerald-700' : 'text-gray-600 hover:text-emerald-600 hover:bg-emerald-50' }}">
                        <span>ℹ️</span> Tentang Kami
                    </a>
                    <a href="{{ route('catalog') }}" 
                       class="px-4 py-3 rounded-xl transition-all font-medium flex items-center gap-2
                              {{ request()->routeIs('catalog') ? 'bg-emerald-100 text-emerald-700' : 'text-gray-600 hover:text-emerald-600 hover:bg-emerald-50' }}">
                        <span>🛒</span> Produk
                    </a>
                    <a href="{{ route('catalog') }}" 
                       class="mt-2 bg-emerald-600 text-white text-center px-4 py-3 rounded-xl font-semibold hover:bg-emerald-700 transition-all btn-premium">
                        💬 Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- 1️⃣ HERO ABOUT - Premium Minimal Style -->
<header class="bg-gradient-to-br from-emerald-600 to-teal-700 text-white py-20 sm:py-28">        
        <!-- Subtle Background Blobs -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-10 right-10 w-72 h-72 bg-emerald-300/20 rounded-full blur-3xl animate-float" style="animation-delay: 1.5s;"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 text-center relative z-10 fade-in-up">

            <!-- Headline -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight mb-6">
                Tentang 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 to-white">
                    PujiFarm
                </span>
            </h1>
            
            <!-- Subheading -->
            <p class="text-base sm:text-xl text-emerald-100 max-w-3xl mx-auto leading-relaxed px-2">
                Kami adalah usaha peternakan keluarga yang berfokus pada kualitas, 
                transparansi, dan proses produksi yang terkontrol dari awal hingga ke tangan pelanggan.
            </p>
        </div>
    </header>

    <!-- 2️⃣ CERITA BRAND - Clean Layout -->
    <section class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">

                <!-- Image/Illustration -->
                <div class="lg:w-1/2 w-full fade-in-up">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-emerald-100 to-blue-100 rounded-3xl p-8 sm:p-10 h-72 sm:h-80 flex items-center justify-center card-hover border border-gray-100">
                            <div class="text-center">
                                <div class="text-7xl sm:text-8xl mb-4 animate-float">🏡</div>
                                <p class="text-gray-700 font-semibold text-sm sm:text-base">Usaha Keluarga Sejak 1999</p>
                            </div>
                        </div>
                        
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-4 shadow-xl border border-gray-100 card-hover">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-2xl">✨</div>
                                <div>
                                    <div class="font-bold text-gray-800 text-sm">100% Lokal</div>
                                    <div class="text-xs text-gray-500">Produk dalam negeri</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="lg:w-1/2 w-full fade-in-up" style="animation-delay: 0.1s;">
                    <span class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full mb-5">
                        Cerita Kami
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">Perjalanan PujiFarm</h2>
                    
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p class="text-sm sm:text-base">
                            PujiFarm lahir dari komitmen keluarga untuk menyediakan produk peternakan yang berkualitas, 
                            sehat, dan dapat dipercaya. Berawal dari skala kecil, kami terus berkembang dengan tetap 
                            menjaga standar produksi yang konsisten.
                        </p>
                        <p class="text-sm sm:text-base">
                            Kami memiliki <strong class="text-gray-800">kandang sendiri</strong> yang dikelola secara langsung, 
                            sehingga setiap proses pemeliharaan dapat terkontrol dengan baik dan memastikan kondisi ternak tetap optimal.
                        </p>
                        <p class="text-sm sm:text-base">
                            Selain itu, kami juga menggunakan <strong class="text-gray-800">pakan mandiri</strong> yang diformulasikan untuk 
                            menjaga kualitas dan kesehatan ternak, sehingga produk yang dihasilkan lebih terjamin.
                        </p>
                    </div>
                    
                    <!-- Stats Mini -->
                    <div class="grid grid-cols-3 gap-4 mt-8 pt-6 border-t border-gray-100">
                        <div class="text-center">   
                            <div class="text-2xl font-bold text-emerald-600">20+</div>
                            <div class="text-xs text-gray-500">Tahun Pengalaman</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-emerald-600">5.000+</div>
                            <div class="text-xs text-gray-500">Pelanggan Puas</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-emerald-600">100%</div>
                            <div class="text-xs text-gray-500">Kualitas Terjamin</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3️⃣ VISI & MISI - Clean Cards -->
    <section class="py-16 sm:py-24 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">
            
            <!-- Section Header -->
            <div class="text-center mb-12 sm:mb-16 fade-in-up">
                <span class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full mb-4">
                    Arah Kami
                </span>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">Visi & Misi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">
                    Arah dan tujuan yang kami pegang dalam setiap langkah
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-6 sm:gap-8 max-w-5xl mx-auto">
                
                <!-- Visi Card -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-200 card-hover fade-in-up">
                    <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center text-2xl mb-5">
                        🎯
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Visi</h3>
                    <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
                        Menjadi peternakan yang dipercaya pelanggan dengan produk berkualitas, 
                        proses yang transparan, dan pelayanan yang konsisten.
                    </p>
                </div>

                <!-- Misi Card -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-gray-200 card-hover fade-in-up" style="animation-delay: 0.1s;">
                    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center text-2xl mb-5">
                        📋
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Misi</h3>
                    <ul class="space-y-3 text-gray-600 text-sm sm:text-base">
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-600 mt-0.5">✓</span>
                            <span>Mengelola peternakan dengan standar kualitas tinggi</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-600 mt-0.5">✓</span>
                            <span>Menggunakan pakan mandiri untuk menjaga kualitas ternak</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-600 mt-0.5">✓</span>
                            <span>Memberikan produk segar dan terpercaya</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-emerald-600 mt-0.5">✓</span>
                            <span>Membangun hubungan jangka panjang dengan pelanggan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 4️⃣ KEUNGGULAN - Premium Grid -->
    <section class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6">
            
            <!-- Section Header -->
            <div class="text-center mb-12 sm:mb-16 fade-in-up">
                <span class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full mb-4">
                    Keunggulan
                </span>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">Kenapa Pilih PujiFarm?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">
                    Alasan pelanggan percaya dan kembali berbelanja bersama kami
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                
                <!-- Card 1 -->
                <div class="bg-gray-50 rounded-2xl p-6 text-center card-hover fade-in-up group">
                    <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                        ✅
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2 text-sm sm:text-base">Kandang Sendiri</h4>
                    <p class="text-xs sm:text-sm text-gray-600">Proses pemeliharaan terkontrol langsung</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-gray-50 rounded-2xl p-6 text-center card-hover fade-in-up group" style="animation-delay: 0.1s;">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                        ⚙️
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2 text-sm sm:text-base">Proses Modern</h4>
                    <p class="text-xs sm:text-sm text-gray-600">Teknologi terbaru untuk efisiensi & konsistensi</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-gray-50 rounded-2xl p-6 text-center card-hover fade-in-up group" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                        🌿
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2 text-sm sm:text-base">Pakan Mandiri</h4>
                    <p class="text-xs sm:text-sm text-gray-600">Bahan terbaik dari sumber terpercaya</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-gray-50 rounded-2xl p-6 text-center card-hover fade-in-up group" style="animation-delay: 0.3s;">
                    <div class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                        🚀
                    </div>
                    <h4 class="font-bold text-gray-900 mb-2 text-sm sm:text-base">Pelayanan Cepat</h4>
                    <p class="text-xs sm:text-sm text-gray-600">Respon cepat & pengiriman tepat waktu</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 🗺️ GOOGLE MAPS SECTION - Clean Style -->
    <section class="py-16 sm:py-24 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">
            
            <!-- Section Header -->
            <div class="text-center mb-10 sm:mb-12 fade-in-up">
                <span class="inline-block px-4 py-1.5 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full mb-4">
                    Lokasi
                </span>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">📍 Lokasi PujiFarm</h2>
                <p class="text-gray-600 text-sm sm:text-base max-w-2xl mx-auto">
                    Kunjungi langsung atau gunakan navigasi untuk pengiriman
                </p>
            </div>

            <!-- Map Container -->
            <div class="max-w-4xl mx-auto fade-in-up">
                <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-sm card-hover">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.3354610841154!2d109.57824186827504!3d-7.7535204647607046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7acdc374c0915b%3A0x3258dd6b0b1eebe7!2sAyam%20Potong%20dan%20Telur%20Bu%20Puji!5e0!3m2!1sen!2sid!4v1771464012941!5m2!1sen!2sid" 
                        width="100%" 
                        height="350" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi PujiFarm">
                    </iframe>
                </div>

                <!-- Address Card -->
                <div class="mt-5 p-5 sm:p-6 bg-white rounded-2xl border border-gray-200 shadow-sm">
                    <div class="flex flex-col sm:flex-row gap-4 sm:items-start">
                        <span class="text-3xl">🏡</span>
                        <div class="flex-1">
                            <h4 class="font-semibold text-gray-900 mb-2">Alamat Lengkap</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Jl. Armed RT 02 / RW 03<br>
                                Desa Munggu, Kecamatan Petanahan<br>
                                Kabupaten Kebumen, Jawa Tengah 54382
                            </p>
                        </div>
                        <div class="flex gap-2 mt-3 sm:mt-0">
                            <a href="https://maps.google.com/?q=Ayam+Potong+dan+Telur+Bu+Puji,+Desa+Kreweng,+Petanahan,+Kebumen" 
                               target="_blank"
                               class="inline-flex items-center gap-1.5 bg-emerald-600 text-white text-sm font-medium px-4 py-2.5 rounded-xl hover:bg-emerald-700 transition-all btn-premium whitespace-nowrap">
                                🗺️ Buka Maps
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Info -->
                <div class="mt-5 text-center text-xs text-gray-500">
                    <p>📦 Pengiriman tersedia untuk area Petanahan & sekitarnya</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section - Simple -->
    <section class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-4 sm:px-6 text-center fade-in-up">
            <div class="max-w-2xl mx-auto">
                <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-5">
                    Siap Memesan Produk Segar?
                </h3>
                <p class="text-gray-600 mb-8 text-sm sm:text-base">
                    Jelajahi katalog kami dan temukan produk yang sesuai dengan kebutuhan Anda
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('catalog') }}" 
                       class="inline-flex items-center justify-center gap-2 bg-emerald-600 text-white font-semibold px-8 py-3.5 rounded-xl shadow-lg shadow-emerald-500/25 hover:bg-emerald-700 transition-all btn-premium">
                        🛒 Lihat Produk
                    </a>
                    <a href="https://wa.me/{{ $waNumber }}?text=Halo PujiFarm, saya ingin bertanya tentang produk" 
                       target="_blank"
                       class="inline-flex items-center justify-center gap-2 bg-white text-emerald-600 font-semibold px-8 py-3.5 rounded-xl border-2 border-emerald-600 hover:bg-emerald-50 transition-all">
                        💬 Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer - Clean Style -->
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
                            <a href="#" class="text-gray-400 hover:text-white transition-colors p-1" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors p-1" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12a10 10 0 10-11.5 9.9v-7h-2.3V12h2.3V9.8c0-2.3 1.4-3.6 3.5-3.6 1 0 2 .2 2 .2v2.2h-1.2c-1.2 0-1.6.7-1.6 1.5V12h2.7l-.4 2.9h-2.3v7A10 10 0 0022 12z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors p-1" aria-label="TikTok">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16.5 3c.3 1.7 1.7 3.1 3.5 3.4v2.3c-1.4 0-2.7-.4-3.8-1.2v7.3a5 5 0 11-5-5c.3 0 .6 0 .9.1v2.5a2.5 2.5 0 102.5 2.5V3h1.9z" />
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
                const isHidden = mobileMenu.classList.contains('hidden');
                iconMenu.classList.toggle('hidden', !isHidden);
                iconClose.classList.toggle('hidden', isHidden);
                mobileMenuBtn.setAttribute('aria-expanded', !isHidden);
            });
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    iconMenu.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                });
            });
        }
    </script>

</body>
</html>