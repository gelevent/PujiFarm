<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PujiFarm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * { font-family: 'Inter', sans-serif; }
        
        /* Smooth animations */
        .fade-in { animation: fadeIn 0.4s ease-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Subtle floating background */
        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-8px) scale(1.02); }
        }
        .animate-float { animation: float 4s ease-in-out infinite; }
        
        /* Focus ring yang lebih halus */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15);
        }
        
        /* Button hover lift */
        .btn-hover:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 30px -8px rgba(124, 58, 237, 0.35);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-emerald-50 via-white to-teal-50 min-h-screen flex items-center justify-center p-4">

    <!-- Decorative Background (Subtle) -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-1/4 w-64 h-64 bg-emerald-200/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-1/4 w-72 h-72 bg-teal-200/30 rounded-full blur-3xl animate-float" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-100/20 rounded-full blur-3xl"></div>
    </div>

    <!-- Login Card -->
    <div class="relative w-full max-w-md fade-in">
        
        <!-- Card -->
        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
            
            <!-- Header Minimalis -->
            <div class="px-8 pt-10 pb-6 text-center">
                <!-- Logo -->
                <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-emerald-600 to-teal-600 rounded-2xl mb-5 shadow-lg shadow-emerald-500/25">
                    <span class="text-2xl">⚡</span>
                </div>
                
                <!-- Title -->
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight">PujiFarm Admin</h1>
                <p class="text-gray-500 text-sm mt-2">Kelola produk dengan mudah</p>
            </div>

            <!-- Form Section -->
            <div class="px-8 pb-10">
                
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50/80 border border-red-100 rounded-xl fade-in" role="alert">
                        <div class="flex items-start gap-3">
                            <span class="text-red-500 text-lg mt-0.5">⚠️</span>
                            <div>
                                <p class="font-semibold text-red-800 text-sm">Login Gagal</p>
                                <ul class="text-sm text-red-600 mt-1 space-y-0.5">
                                    @foreach($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50/80 border border-red-100 rounded-xl fade-in" role="alert">
                        <p class="text-sm text-red-600">{{ session('error') }}</p>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login.process') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email Admin
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-lg">📧</span>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                value="{{ old('email') }}"
                                class="w-full pl-11 pr-4 py-3.5 border border-gray-200 rounded-xl text-sm 
                                       bg-gray-50/50 focus:bg-white
                                       focus:outline-none input-focus focus:border-emerald-500 
                                       transition-all duration-200
                                       @error('email') border-red-300 bg-red-50/50 @enderror"
                                placeholder="admin@pujifarm.com"
                                required
                                autofocus
                            >
                        </div>
                        @error('email')
                            <p class="text-xs text-red-500 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-lg">🔐</span>
                            <input 
                                type="password" 
                                id="password"
                                name="password" 
                                class="w-full pl-11 pr-12 py-3.5 border border-gray-200 rounded-xl text-sm 
                                       bg-gray-50/50 focus:bg-white
                                       focus:outline-none input-focus focus:border-emerald-500 
                                       transition-all duration-200
                                       @error('password') border-red-300 bg-red-50/50 @enderror"
                                placeholder="••••••••"
                                required
                            >
                            <button type="button" 
                                    onclick="togglePassword()" 
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors p-1"
                                    aria-label="Toggle password visibility">
                                <span id="eyeIcon" class="text-lg">👁️</span>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-xs text-red-500 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input type="checkbox" 
                               name="remember" 
                               id="remember"
                               class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500 focus:ring-offset-0 cursor-pointer">
                        <label for="remember" class="ml-2 text-sm text-gray-600 cursor-pointer select-none">
                            Ingat saya di perangkat ini
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                        class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 text-white 
                               font-semibold py-3.5 px-6 rounded-xl 
                               shadow-lg shadow-emerald-500/25
                               hover:shadow-xl hover:shadow-emerald-500/35
                               focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 
                               transition-all duration-200 btn-hover">
                        Masuk ke Dashboard
                    </button>
                </form>

                <!-- Security Badge -->
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="flex items-center justify-center gap-2 text-xs text-gray-400">
                        <span class="text-green-500">🔒</span>
                        <span>Koneksi terenkripsi • Data aman</span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Link (Minimal) -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center gap-1.5 text-gray-500 hover:text-emerald-600 
                      text-sm font-medium transition-colors">
                <span>←</span> Kembali ke website
            </a>
        </div>

    </div>

    <!-- JavaScript -->
    <script>
        // Toggle Password Visibility dengan animasi icon
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️';
            }
        }

        // Auto-focus email jika kosong
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.getElementById('email');
            if (emailInput && !emailInput.value) {
                setTimeout(() => emailInput.focus(), 100);
            }
        });

        // Prevent form submit on Enter di password field (optional UX)
        document.querySelector('form')?.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.id === 'password') {
                // Biarkan submit normal, tapi bisa ditambah validasi dulu jika perlu
            }
        });
    </script>

</body>
</html>