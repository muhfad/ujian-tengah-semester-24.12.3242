<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventify - Platform Tiket Event & Konser</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800 flex flex-col min-h-screen">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600 tracking-wider">Eventify.</a>
                </div>
                <div class="hidden md:flex space-x-8 font-medium">
                    <a href="{{ route('home') }}" class="text-indigo-600 border-b-2 border-indigo-600 px-1 pt-1">Jelajahi Event</a>
                    <a href="{{ route('home') }}" class="text-slate-500 hover:text-slate-700 px-1 pt-1 transition">Kategori</a>
                    <a href="{{ route('ticket') }}" class="text-slate-500 hover:text-slate-700 px-1 pt-1 transition">Tiket Saya</a>
                </div>
                <div>
                    <a href="{{ route('admin.dashboard') }}" class="bg-slate-100 text-slate-700 font-semibold py-2 px-4 rounded-lg hover:bg-slate-200 transition">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-slate-900 text-slate-400 py-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="font-semibold text-slate-200">&copy; 2026 Eventify Inc. Hak Cipta Dilindungi.</p>
            <p class="text-xs mt-1 text-slate-500">Modul Praktikum DB - S1 Sistem Informasi Universitas AMIKOM Yogyakarta</p>
        </div>
    </footer>

</body>
</html>