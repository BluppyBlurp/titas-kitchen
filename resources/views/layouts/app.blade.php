<!DOCTYPE html>
<html lang="en" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', "Tita's Kitchen") }}</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Tailwind + App CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Dark mode overrides */
        .dark-mode { background-color: #1a0f08 !important; color: #f5ede4 !important; }
        .dark-mode nav { background-color: #1a0f08 !important; border-color: rgba(255,255,255,0.08) !important; }
        .dark-mode footer { background-color: #0d0704 !important; }
        .dark-mode .bg-white { background-color: #2a1a10 !important; }
        .dark-mode .bg-\[\#FFFAF3\] { background-color: #1a0f08 !important; }
        .dark-mode .bg-\[\#FDF6EC\] { background-color: #1a0f08 !important; }
        .dark-mode .text-\[\#2C1A0E\] { color: #f0e4d6 !important; }
        .dark-mode .border-\[\#2C1A0E\]\/10 { border-color: rgba(255,255,255,0.1) !important; }
        .dark-mode .shadow-sm { box-shadow: 0 1px 3px rgba(0,0,0,0.5) !important; }
    </style>
</head>
<body class="bg-[#FDF6EC] text-[#2C1A0E] font-[Inter]" id="body-root">

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-50 bg-[#FDF6EC] border-b border-[#2C1A0E]/10 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="/" class="font-[Playfair_Display] text-2xl font-black text-[#C0392B]">
                🍲 Tita's Kitchen
            </a>
            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="/" class="hover:text-[#C0392B] transition">Home</a>
                <a href="/menu" class="hover:text-[#C0392B] transition">Menu</a>
                <a href="/cart" class="relative hover:text-[#C0392B] transition">
                    🛒 Cart
                    <span id="cart-count" class="absolute -top-2 -right-4 bg-[#C0392B] text-white text-xs rounded-full w-4 h-4 flex items-center justify-center hidden">0</span>
                </a>
                <!-- Dark mode toggle -->
                <button id="theme-toggle" title="Toggle dark mode"
                    class="w-8 h-8 rounded-full border border-[#2C1A0E]/20 flex items-center justify-center hover:border-[#C0392B] transition text-sm select-none">
                    <span id="theme-icon">🌙</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#2C1A0E] text-[#FDF6EC] text-center py-8 mt-16">
        <p class="font-[Playfair_Display] text-xl mb-2">🍲 Tita's Kitchen</p>
        <p class="text-sm opacity-70">{{ $footerNote ?? 'Orders via Facebook Messenger only. Payment via GCash.' }}</p>
        <p class="text-xs opacity-40 mt-4">Made with ❤️ for Tita</p>
    </footer>

    <script>
        // Cart count
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('titas_cart') || '[]');
            const count = cart.reduce((sum, item) => sum + item.quantity, 0);
            const badge = document.getElementById('cart-count');
            if (count > 0) { badge.textContent = count; badge.classList.remove('hidden'); }
            else { badge.classList.add('hidden'); }
        }
        updateCartCount();

        // Dark mode
        const body = document.getElementById('body-root');
        const icon = document.getElementById('theme-icon');
        if (localStorage.getItem('titas_theme') === 'dark') {
            body.classList.add('dark-mode');
            icon.textContent = '☀️';
        }
        document.getElementById('theme-toggle').addEventListener('click', () => {
            const isDark = body.classList.toggle('dark-mode');
            icon.textContent = isDark ? '☀️' : '🌙';
            localStorage.setItem('titas_theme', isDark ? 'dark' : 'light');
        });
    </script>

    @stack('scripts')
</body>
</html>
