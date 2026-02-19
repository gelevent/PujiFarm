<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - PujiFarm</title>
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

        .nav-link.active::after {
            transform: scaleX(1);
        }

        /* Subtle animations */
        .fade-in-up {
            animation: fadeInUp 0.4s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card hover lift */
        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.12);
        }

        /* Button hover effect */
        .btn-premium {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px -8px rgba(16, 185, 129, 0.3);
        }

        /* Image zoom on hover */
        .img-zoom {
            transition: transform 0.4s ease;
        }

        .group:hover .img-zoom {
            transform: scale(1.03);
        }

        /* Line clamp for descriptions */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Search input focus glow */
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
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
                    <svg id="iconMenu" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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

    <!-- Header Section - Clean Minimal -->
    <header class="bg-white border-b border-gray-200 py-8 sm:py-12">
        <div class="container mx-auto px-4 sm:px-6 text-center fade-in-up">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                Semua Produk PujiFarm
            </h1>
            <p class="text-gray-600 text-sm sm:text-base max-w-2xl mx-auto">
                Temukan produk terbaik kami dengan kualitas terjamin, langsung dari peternakan ke tangan Anda
            </p>
        </div>
    </header>

    <!-- Search Section - Premium Styling -->
    <section class="py-6 sm:py-8 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="max-w-3xl mx-auto">
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-lg">🔍</span>
                    <input type="text" id="searchInput" placeholder="Cari produk, misalnya: ayam, telur, pakan..."
                        class="search-input w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl text-sm sm:text-base 
                               bg-white focus:bg-white focus:outline-none focus:border-emerald-500 
                               transition-all duration-200 shadow-sm" onkeyup="filterProducts()" autocomplete="off">
                </div>
                <div class="flex items-center justify-between mt-3 text-xs text-gray-500">
                    <span><strong id="resultCount">{{ count($items) }}</strong> produk tersedia</span>
                    <span class="hidden sm:inline">Ketik untuk filter instan • Tekan ESC untuk reset</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid - Premium Cards -->
    <section class="py-8 sm:py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6" id="productsGrid">
                @foreach($items as $index => $item)
                    <div class="product-card group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 
                                                    overflow-hidden border border-gray-200 card-hover fade-in-up"
                        style="animation-delay: {{ $index * 0.05 }}s" data-name="{{ strtolower($item->name) }}"
                        data-desc="{{ strtolower($item->description) }}">

                        <!-- Image Container -->
                        <div class="overflow-hidden h-44 sm:h-52 bg-gray-100 relative">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="w-full h-full object-cover img-zoom">
                            @else
                                <div
                                    class="w-full h-full flex items-center justify-center text-4xl sm:text-5xl text-gray-300 bg-gradient-to-br from-emerald-50/50 to-blue-50/50">
                                    📦
                                </div>
                            @endif

                            <!-- Highlight Badge -->
                            @if($item->is_highlight)
                                <span
                                    class="absolute top-3 left-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white 
                                                                                   text-[10px] sm:text-xs px-2.5 py-1 rounded-full font-semibold shadow-sm">
                                    ⭐ Highlight
                                </span>
                            @endif

                        </div>

                        <!-- Content -->
                        <div class="p-4 sm:p-5 flex flex-col">
                            <!-- Product Name -->
                            <h3
                                class="font-bold text-base sm:text-lg text-gray-900 mb-1.5 group-hover:text-emerald-600 transition-colors line-clamp-1">
                                {{ $item->name }}
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 text-xs sm:text-sm mb-4 flex-1 line-clamp-2 leading-relaxed">
                                {{ $item->description }}
                            </p>

                            <!-- Price & Rating Row -->
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-lg sm:text-xl font-bold text-emerald-600">
                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                </span>
                                <div class="flex items-center gap-0.5">
                                    <span class="text-yellow-400 text-xs">★★★★★</span>
                                </div>
                            </div>

                            <!-- WhatsApp Button -->
                            <a href="https://wa.me/{{ $waNumber }}?text=Halo PujiFarm, saya tertarik dengan {{ $item->name }} (Rp {{ number_format($item->price) }})"
                                target="_blank"
                                class="block w-full bg-emerald-600 text-white text-center px-4 py-2.5 rounded-xl 
                                                          font-semibold hover:bg-emerald-700 transition-all btn-premium text-xs sm:text-sm">
                                💬 Pesan via WhatsApp
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Results State - Clean & Friendly -->
            <div id="noResults" class="hidden text-center py-16 sm:py-24 fade-in-up">
                <div class="max-w-md mx-auto">
                    <div class="text-6xl sm:text-7xl mb-4">🔍</div>
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 mb-2">Produk tidak ditemukan</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-6">
                        Coba gunakan kata kunci lain, atau hapus filter pencarian untuk melihat semua produk
                    </p>
                    <button onclick="document.getElementById('searchInput').value=''; filterProducts();"
                        class="inline-flex items-center gap-2 text-emerald-600 font-medium hover:text-emerald-700 transition-colors text-sm">
                        <span>↺</span> Reset Pencarian
                    </button>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA Section - Simple & Clean -->
    <section class="py-12 sm:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 text-center fade-in-up">
            <div class="max-w-2xl mx-auto">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4">
                    Butuh Bantuan Memilih Produk?
                </h3>
                <p class="text-gray-600 text-sm sm:text-base mb-6">
                    Tim kami siap membantu Anda menemukan produk yang tepat untuk kebutuhan
                </p>
                <a href="https://wa.me/{{ $waNumber }}?text=Halo PujiFarm, saya butuh bantuan memilih produk"
                    target="_blank" class="inline-flex items-center gap-2 bg-white text-emerald-600 font-semibold px-6 py-3 rounded-xl 
                          border-2 border-emerald-600 hover:bg-emerald-50 transition-all btn-premium text-sm">
                    💬 Chat Konsultasi Gratis
                </a>
            </div>
        </div>
    </section>

    <!-- Footer - Clean Minimal -->
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
                            <a href="#" class="text-gray-400 hover:text-white transition-colors p-1"
                                aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5a5 5 0 110 10 5 5 0 010-10zm6.5-.8a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors p-1"
                                aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M22 12a10 10 0 10-11.5 9.9v-7h-2.3V12h2.3V9.8c0-2.3 1.4-3.6 3.5-3.6 1 0 2 .2 2 .2v2.2h-1.2c-1.2 0-1.6.7-1.6 1.5V12h2.7l-.4 2.9h-2.3v7A10 10 0 0022 12z" />
                                </svg>
                            </a>
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

    <!-- JavaScript: Search Filter + Mobile Menu -->
    <script>
        // Live Search Filter
        function filterProducts() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.product-card');
            const grid = document.getElementById('productsGrid');
            const noResults = document.getElementById('noResults');
            const resultCount = document.getElementById('resultCount');

            let visibleCount = 0;

            cards.forEach(card => {
                const name = card.getAttribute('data-name') || '';
                const desc = card.getAttribute('data-desc') || '';

                if (name.includes(filter) || desc.includes(filter)) {
                    card.style.display = 'block';
                    // Re-trigger animation for smooth appearance
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(8px)';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 10);
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCount === 0) {
                grid.classList.add('hidden');
                noResults.classList.remove('hidden');
            } else {
                grid.classList.remove('hidden');
                noResults.classList.add('hidden');
            }

            // Update result count with animation
            resultCount.textContent = visibleCount;
        }

        // Reset search with ESC key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                const input = document.getElementById('searchInput');
                if (input && input.value) {
                    input.value = '';
                    filterProducts();
                    input.focus();
                }
            }
        });

        // Mobile Menu Toggle
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