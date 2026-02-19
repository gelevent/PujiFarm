<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - PujiFarm Admin</title>
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🐔</text></svg>">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Inter', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
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

        /* Card hover lift (desktop only) */
        @media (min-width: 768px) {
            .card-hover:hover {
                transform: translateY(-3px);
                box-shadow: 0 12px 28px -8px rgba(0, 0, 0, 0.1);
            }
        }

        /* Button hover effect (desktop only) */
        @media (min-width: 768px) {
            .btn-premium:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 20px -6px rgba(16, 185, 129, 0.35);
            }
        }

        /* Input focus glow */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.12);
        }

        /* Prevent zoom on input focus in iOS */
        @media screen and (-webkit-min-device-pixel-ratio: 0) {

            input,
            select,
            textarea {
                font-size: 16px !important;
            }
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen antialiased">

    <!-- Navbar - STICKY & RESPONSIVE -->
    <nav class="bg-white/95 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">
            <div class="flex justify-between items-center">

                <!-- Logo -->
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-2 text-lg sm:text-xl font-bold text-gray-900 hover:text-emerald-600 transition-colors">
                    <span class="text-emerald-600">⚡</span> <span class="hidden sm:inline">PujiFarm Admin</span><span
                        class="sm:hidden">Admin</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-gray-600 hover:text-emerald-600 px-4 py-2 rounded-xl text-sm font-medium transition-colors flex items-center gap-1.5 hover:bg-emerald-50">
                        📦 Items
                    </a>
                    <a href="{{ route('admin.settings') }}"
                        class="text-emerald-600 font-semibold px-4 py-2 rounded-xl text-sm font-medium flex items-center gap-1.5 bg-emerald-50">
                        ⚙️ Settings
                    </a>
                    <a href="{{ route('home') }}" target="_blank"
                        class="text-gray-600 hover:text-emerald-600 px-4 py-2 rounded-xl text-sm font-medium transition-colors flex items-center gap-1.5 hover:bg-emerald-50">
                        🌐 Web
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-red-600 hover:text-red-700 px-4 py-2 rounded-xl text-sm font-medium transition-colors flex items-center gap-1.5 hover:bg-red-50">
                            Logout
                        </button>
                    </form>
                </div>

                <!-- Mobile Menu Button (Larger touch target) -->
                <button id="mobileMenuBtn"
                    class="md:hidden p-3 text-gray-600 hover:text-emerald-600 transition-colors rounded-xl hover:bg-emerald-50 active:bg-emerald-100"
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
                <div class="flex flex-col gap-2 px-2">
                    <a href="{{ route('admin.dashboard') }}"
                        class="px-4 py-3.5 rounded-xl transition-all font-medium flex items-center gap-3 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 active:bg-emerald-100">
                        <span class="text-lg">📦</span> Kelola Items
                    </a>
                    <a href="{{ route('admin.settings') }}"
                        class="px-4 py-3.5 rounded-xl transition-all font-medium flex items-center gap-3 text-emerald-700 bg-emerald-50">
                        <span class="text-lg">⚙️</span> Settings WA
                    </a>
                    <a href="{{ route('home') }}" target="_blank"
                        class="px-4 py-3.5 rounded-xl transition-all font-medium flex items-center gap-3 text-gray-700 hover:text-emerald-600 hover:bg-emerald-50 active:bg-emerald-100">
                        <span class="text-lg">🌐</span> Lihat Website
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="mt-1">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-3.5 rounded-xl transition-all font-medium flex items-center gap-3 text-red-600 hover:text-red-700 hover:bg-red-50 active:bg-red-100">
                            <span class="text-lg">🚪</span> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content - Mobile Optimized -->
    <main class="max-w-7xl mx-auto py-4 sm:py-6 px-4 sm:px-6">

        <!-- Page Header -->
        <div class="mb-5 sm:mb-8 fade-in-up">
            <h1 class="text-xl sm:text-2xl font-bold text-gray-900">⚙️ Settings</h1>
            <p class="text-gray-600 text-sm mt-1">Kelola konfigurasi WhatsApp untuk pemesanan</p>
        </div>

        <!-- Settings Card - Full Width on Mobile -->
        <div class="w-full fade-in-up" style="animation-delay: 0.1s;">

            <!-- Notifikasi Success -->
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3.5 rounded-xl mb-5 flex items-center gap-3 fade-in-up"
                    role="alert">
                    <span class="text-xl">✅</span>
                    <div>
                        <p class="font-semibold text-sm">Berhasil!</p>
                        <p class="text-xs">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- WhatsApp Settings Form Card -->
            <div class="bg-white shadow-sm rounded-2xl p-5 sm:p-7 border border-gray-200 card-hover">

                <!-- Card Header -->
                <div class="flex items-center gap-3 mb-6 pb-5 border-b border-gray-100">
                    <div
                        class="w-11 h-11 sm:w-12 sm:h-12 bg-green-100 rounded-xl flex items-center justify-center text-xl sm:text-2xl flex-shrink-0">
                        💬
                    </div>
                    <div class="min-w-0">
                        <h2 class="text-base sm:text-lg font-bold text-gray-900">Nomor WhatsApp</h2>
                        <p class="text-xs sm:text-sm text-gray-500">Nomor ini akan menerima pesan dari customer</p>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf

                    <!-- Input Nomor WA -->
                    <div class="mb-5">
                        <label for="whatsapp_number" class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor WhatsApp <span class="text-red-500">*</span>
                        </label>

                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-lg">📱</span>
                            <input type="text" id="whatsapp_number" name="whatsapp_number"
                                value="{{ old('whatsapp_number', $waNumber) }}"
                                class="w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl text-base sm:text-sm input-focus focus:border-emerald-500 transition-all bg-gray-50/50 focus:bg-white"
                                placeholder="628123456789" pattern="^[0-9]+$"
                                title="Hanya angka, format internasional (contoh: 628123456789)" required
                                inputmode="numeric">
                        </div>

                        <!-- Helper Text - Compact for Mobile -->
                        <div class="mt-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <p class="text-xs text-gray-600">
                                <span class="text-emerald-600 font-medium">💡 Format:</span>
                                <code class="bg-white px-1.5 py-0.5 rounded border border-gray-200">628123456789</code>
                                <span class="text-gray-400 mx-1">•</span>
                                Tanpa 0 atau + di depan
                            </p>
                        </div>
                    </div>

                    <!-- Preview Link - Collapsible on Mobile (Optional Enhancement) -->
                    <div class="mb-6 p-4 bg-emerald-50 rounded-xl border border-emerald-100">
                        <p class="text-xs font-medium text-emerald-800 mb-2">🔗 Preview Link:</p>
                        <code id="waPreview"
                            class="block text-xs text-emerald-700 break-all bg-white px-3 py-2.5 rounded-lg border border-emerald-200 font-mono">
                            https://wa.me/628123456789
                        </code>
                    </div>

                    <!-- Action Buttons - Stack on Mobile -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center items-center gap-2 py-3.5 px-6 rounded-xl text-sm font-semibold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all btn-premium shadow-sm shadow-emerald-500/25 active:scale-95">
                            💾 Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.dashboard') }}"
                            class="w-full sm:w-auto inline-flex justify-center items-center gap-2 py-3.5 px-6 rounded-xl text-sm font-semibold text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all active:bg-gray-100">
                            ← Kembali
                        </a>
                    </div>
                </form>
            </div>

            <!-- Info Card - Simple & Clean -->
            <div class="mt-5 p-4 bg-blue-50 rounded-xl border border-blue-100 fade-in-up"
                style="animation-delay: 0.2s;">
                <h4 class="font-semibold text-blue-800 text-sm mb-2 flex items-center gap-2">
                    <span>ℹ️</span> Cara Kerja
                </h4>
                <ul class="text-xs text-blue-700 space-y-1.5">
                    <li>• Customer klik "Pesan" di website</li>
                    <li>• WhatsApp terbuka dengan pesan terisi</li>
                    <li>• Customer kirim, admin langsung terima</li>
                </ul>
            </div>

        </div>
    </main>

    <!-- Footer Mini - Mobile Friendly -->
    <footer class="border-t border-gray-200 py-5 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center text-xs text-gray-400">
            &copy; {{ date('Y') }} PujiFarm Admin
            <span class="hidden sm:inline">•</span>
            <a href="{{ route('home') }}" target="_blank"
                class="sm:hidden text-emerald-600 hover:text-emerald-700">Kembali ke Web</a>
        </div>
    </footer>

    <!-- JavaScript: Mobile Menu + Preview -->
    <script>
        // Mobile Menu Toggle with proper accessibility
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconMenu = document.getElementById('iconMenu');
        const iconClose = document.getElementById('iconClose');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
                mobileMenu.classList.toggle('hidden');
                iconMenu.classList.toggle('hidden', !isExpanded);
                iconClose.classList.toggle('hidden', isExpanded);
                mobileMenuBtn.setAttribute('aria-expanded', !isExpanded);
            });

            // Close menu when clicking outside (mobile)
            document.addEventListener('click', (e) => {
                if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target) && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    iconMenu.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                }
            });

            // Close menu when clicking a link
            mobileMenu.querySelectorAll('a, button').forEach(el => {
                el.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    iconMenu.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                    mobileMenuBtn.setAttribute('aria-expanded', 'false');
                });
            });
        }

        // Live Preview WhatsApp Link
        const waInput = document.getElementById('whatsapp_number');
        const waPreview = document.getElementById('waPreview');

        if (waInput && waPreview) {
            waInput.addEventListener('input', function () {
                const number = this.value.trim().replace(/[^0-9]/g, '');
                if (number) {
                    waPreview.textContent = `https://wa.me/${number}`;
                } else {
                    waPreview.textContent = 'https://wa.me/628123456789';
                }
            });
        }

        // Prevent double-tap zoom on buttons (iOS)
        document.querySelectorAll('button, a').forEach(el => {
            el.addEventListener('touchstart', function () { }, { passive: true });
        });
    </script>

</body>

</html>