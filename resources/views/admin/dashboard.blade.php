<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PujiFarm</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Navbar - STICKY & RESPONSIVE -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4">
            <div class="flex justify-between items-center">

                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-xl font-bold text-emerald-600">⚡ PujiFarm Admin</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-4">
                    <a href="{{ route('admin.settings') }}"
                        class="text-gray-600 hover:text-emerald-600 px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1">
                        ⚙️ Settings
                    </a>
                    <a href="{{ route('home') }}" target="_blank"
                        class="text-gray-600 hover:text-emerald-600 px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1">
                        🌐 Lihat Web
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-red-600 hover:text-red-700 px-3 py-2 rounded-lg text-sm font-medium transition flex items-center gap-1">
                            Logout
                        </button>
                    </form>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="md:hidden p-2 text-gray-600 hover:text-emerald-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu Dropdown -->
            <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 border-t border-gray-100 pt-4">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('admin.settings') }}"
                        class="text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 px-4 py-2 rounded-lg transition flex items-center gap-2">
                        ⚙️ Settings WA
                    </a>
                    <a href="{{ route('home') }}" target="_blank"
                        class="text-gray-600 hover:text-emerald-600 hover:bg-emerald-50 px-4 py-2 rounded-lg transition flex items-center gap-2">
                        🌐 Lihat Web
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left text-red-600 hover:text-red-700 hover:bg-red-50 px-4 py-2 rounded-lg transition flex items-center gap-2">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6">

        <!-- Notifikasi Success -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg flex items-center gap-3"
                role="alert">
                <span class="text-xl">✅</span>
                <div>
                    <p class="font-bold">Sukses!</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Form Tambah Item - RESPONSIVE -->
        <div class="bg-white shadow-sm rounded-2xl p-5 sm:p-6 mb-6 sm:mb-8 border border-gray-200">
            <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-4 sm:mb-6">➕ Tambah Item Baru</h3>
            <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                @csrf

                <!-- Nama Produk -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="block w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
                        placeholder="Contoh: Ayam Kampung">
                </div>

                <!-- Harga -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp) <span
                            class="text-red-500">*</span></label>
                    <input type="number" name="price" required min="0"
                        class="block w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
                        placeholder="Contoh: 35000">
                </div>

                <!-- Deskripsi -->
                <div class="col-span-1 sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi <span
                            class="text-red-500">*</span></label>
                    <textarea name="description" required rows="3"
                        class="block w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition resize-none"
                        placeholder="Detail produk, keunggulan, dll..."></textarea>
                </div>

                <!-- Gambar -->
                <div class="col-span-1 sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
                    <input type="file" name="image" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 cursor-pointer">
                    <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, GIF. Maksimal 2MB.</p>
                </div>

                <!-- Highlight Checkbox -->
                <div class="col-span-1 sm:col-span-2 flex items-center">
                    <input id="highlight" name="is_highlight" type="checkbox" value="1"
                        class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded cursor-pointer">
                    <label for="highlight" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                        ⭐ Highlight Produk
                    </label>
                </div>

                <!-- Urutan Tampil -->
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                    <input type="number" name="order" value="0" min="0"
                        class="block w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
                        placeholder="0 = paling atas">
                    <p class="text-xs text-gray-400 mt-1">Semakin kecil angka, semakin atas posisinya</p>
                </div>

                <!-- Tombol Submit -->
                <div class="col-span-1 sm:col-span-2 mt-2">
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center py-2.5 px-6 border border-transparent shadow-sm text-sm font-semibold rounded-lg text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition">
                        💾 Simpan Item
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel List Item - RESPONSIVE -->
        <div class="bg-white shadow-sm rounded-2xl border border-gray-200 overflow-hidden">
            <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">📦 Daftar Item ({{ count($items) }})</h3>
                @if(count($items) > 0)
                    <span class="text-xs text-gray-500 hidden sm:inline">Scroll untuk lihat semua kolom</span>
                @endif
            </div>

            <!-- Table Wrapper dengan Horizontal Scroll untuk Mobile -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                Gambar</th>
                            <th scope="col"
                                class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                Produk</th>
                            <th scope="col"
                                class="px-4 sm:px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                Harga</th>
                            <th scope="col"
                                class="px-4 sm:px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                Status</th>
                            <th scope="col"
                                class="px-4 sm:px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($items as $item)
                            <tr class="hover:bg-emerald-50/50 transition border-b border-gray-100 last:border-0 hover:bg-emerald-50/50 hover:shadow-sm transition-all duration-200 ">

                                <!-- 1. Kolom Gambar (Center Vertically) -->
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap align-middle">
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                            class="h-12 w-12 rounded-lg object-cover border border-gray-200 shadow-sm">
                                    @else
                                        <div
                                            class="h-12 w-12 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                            📦
                                        </div>
                                    @endif
                                </td>

                                <!-- 2. Kolom Nama & Deskripsi (Top Align) -->
                                <td class="px-4 sm:px-6 py-4 align-top min-w-[200px]">
                                    <div class="font-semibold text-gray-800 text-sm">{{ $item->name }}</div>
                                    <div class="text-gray-500 text-xs mt-1 line-clamp-2 max-w-[180px]">
                                        {{ $item->description }}
                                    </div>
                                </td>

                                <!-- 3. Kolom Harga (Top Align + Compact) -->
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap align-top">
                                    <div class="flex flex-col gap-1.5">
                                        <!-- Display Harga -->
                                        <span class="font-bold text-emerald-600 text-sm">
                                            Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </span>

                                        <!-- Edit Form Inline (Compact) -->
                                        <form action="{{ route('admin.items.update-price', $item->id) }}" method="POST"
                                            class="flex items-center gap-1.5">
                                            @csrf
                                            <input type="number" name="price" value="{{ $item->price }}" min="0"
                                                class="w-24 px-2.5 py-1 text-xs border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
                                                placeholder="Harga">
                                            <button type="submit"
                                                class="bg-emerald-600 text-white text-xs px-2.5 py-1 rounded-md hover:bg-emerald-700 transition font-medium"
                                                title="Update harga">
                                                ✓
                                            </button>
                                        </form>
                                    </div>
                                </td>

                                <!-- 4. Kolom Highlight (Top Align + Label) -->
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap align-top">
                                    <div class="flex flex-col items-center gap-1.5">
                                        <form action="{{ route('admin.items.toggle-highlight', $item->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <label class="inline-flex items-center cursor-pointer group"
                                                title="Klik untuk toggle highlight">
                                                <input type="hidden" name="is_highlight" value="0">
                                                <input type="checkbox" name="is_highlight" value="1" class="sr-only peer"
                                                    onchange="this.form.submit()" {{ $item->is_highlight ? 'checked' : '' }}>

                                                <!-- Toggle Switch (Ukuran Pas) -->
                                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer 
                                    peer-checked:bg-emerald-600 
                                    after:content-[''] after:absolute after:top-[2px] after:left-[2px] 
                                    after:bg-white after:border-gray-300 after:border after:rounded-full 
                                    after:h-5 after:w-5 after:transition-all 
                                    peer-checked:after:translate-x-5 hover:after:scale-105">
                                                </div>
                                            </label>
                                        </form>
                                        <!-- Label Teks Kecil -->
                                        <span
                                            class="text-[10px] font-medium {{ $item->is_highlight ? 'text-emerald-600' : 'text-gray-400' }}">
                                            {{ $item->is_highlight ? '⭐ Highlight' : 'Regular' }}
                                        </span>
                                    </div>
                                </td>

                                <!-- 5. Kolom Aksi (Center Vertically) -->
                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap align-middle text-right">
                                    <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus \'{{ $item->name }}\'?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-md text-xs font-medium transition border border-red-100">
                                            🗑️ <span class="hidden sm:inline">Hapus</span>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="text-5xl">📭</div>
                                        <div>
                                            <p class="text-gray-700 font-medium">Belum ada item</p>
                                            <p class="text-gray-400 text-sm mt-1">Silakan tambah item baru di form atas</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Info Helper -->
        <div class="mt-6 text-center text-xs text-gray-400">
            <p>💡 Tips: Gunakan checkbox "Highlight" untuk menampilkan produk di halaman depan</p>
        </div>
    </main>

    <!-- Footer Mini -->
    <footer class="border-t border-gray-200 py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 text-center text-sm text-gray-400">
            &copy; {{ date('Y') }} PujiFarm Admin Panel
        </div>
    </footer>

    <!-- JavaScript untuk Mobile Menu -->
    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking on a link
            mobileMenu.querySelectorAll('a, button').forEach(el => {
                el.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        }
    </script>

</body>

</html>