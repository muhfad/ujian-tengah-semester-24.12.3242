<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Eventify</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 font-sans text-slate-800 flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col shrink-0">
        <div class="p-5 font-bold text-white text-xl border-b border-slate-800 tracking-wider">
            Eventify Admin
        </div>
        <nav class="flex-grow p-4 space-y-2 font-medium">
            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-800 hover:text-white' }} transition">
                Dashboard
            </a>
            <a href="{{ route('admin.events.index') }}" class="block py-2.5 px-4 rounded-lg {{ request()->routeIs('admin.events.*') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-800 hover:text-white' }} transition">
                Manajemen Event
            </a>
            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded-lg hover:bg-slate-880 hover:text-white text-slate-500 transition opacity-50 cursor-not-allowed">
                Laporan Transaksi
            </a>
        </nav>
        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('home') }}" class="block w-full text-center bg-slate-800 hover:bg-slate-700 py-2 rounded-lg text-sm text-white font-semibold transition">Kembali ke Web</a>
        </div>
    </aside>

    <main class="flex-grow flex flex-col overflow-y-auto">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center px-8 justify-between shrink-0 shadow-sm">
            <h2 class="font-bold text-slate-800 text-lg">Administrator Workspace</h2>
            <div class="text-sm text-slate-500">Selamat Datang, Admin AMIKOM</div>
        </header>
        <div class="p-8">
            @yield('content')
        </div>
    </main>

</body>
</html>