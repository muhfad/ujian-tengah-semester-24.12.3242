@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-r text-center from-indigo-600 to-violet-700 py-16 text-white px-4">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tight">Temukan Konser & Event Seru di Sekitarmu!</h1>
        <p class="text-indigo-100 text-lg mb-8">Pesan tiket dengan mudah, cepat, dan aman tanpa antre hanya di Eventify.</p>
        
        <form action="{{ route('home') }}" method="GET" class="bg-white p-2 rounded-xl shadow-md flex flex-col md:flex-row gap-2 max-w-xl mx-auto text-slate-700">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari konser musik, workshop, festival..." class="w-full px-4 py-2 focus:outline-none text-sm">
            
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            <button type="submit" class="bg-indigo-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-indigo-700 transition text-sm">
                Cari
            </button>
        </form>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    @if(request('search'))
        <div class="mb-6 text-sm text-slate-500">
            Menampilkan hasil pencarian untuk: <span class="font-bold text-slate-800">"{{ request('search') }}"</span>
            <a href="{{ route('home') }}" class="text-indigo-600 hover:underline ml-2">Bersihkan Pencarian</a>
        </div>
    @endif
    
    <div class="mb-8 border-b border-slate-200">
        <div class="flex space-x-4 overflow-x-auto pb-3">
            <a href="{{ route('home', request()->only(['search'])) }}" class="px-4 py-2 rounded-xl text-sm font-bold shrink-0 transition {{ request('category') == '' ? 'bg-indigo-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                Semua Acara
            </a>
            @foreach($categories as $category)
                <a href="{{ route('home', array_merge(request()->only(['search']), ['category' => $category->slug])) }}" class="px-4 py-2 rounded-xl text-sm font-bold shrink-0 transition {{ request('category') == $category->slug ? 'bg-indigo-600 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($events as $event)
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col hover:shadow-md transition duration-300">
            <div class="bg-slate-200 h-48 w-full flex flex-col items-center justify-center text-slate-400 font-bold relative">
                <span class="absolute top-3 left-3 bg-white/90 backdrop-blur text-slate-800 font-bold px-3 py-1 rounded-full text-xs shadow-sm">
                    {{ $event->category->name ?? 'Kategori' }}
                </span>
                <span class="text-sm tracking-wide">[ Poster Acara ]</span>
            </div>
            <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-bold text-slate-900 mb-1 leading-snug">{{ $event->title }}</h3>
                <p class="text-slate-500 text-xs mb-4 font-semibold">📍 {{ $event->location }}</p>
                <p class="text-slate-600 text-sm line-clamp-2 mb-5">{{ $event->description }}</p>
                <div class="mt-auto flex justify-between items-center pt-4 border-t border-slate-100">
                    <p class="text-lg font-extrabold text-indigo-600">Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                    <span class="bg-slate-900 text-white font-bold py-2 px-4 rounded-xl text-xs cursor-pointer">Beli Tiket</span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-16 text-center text-slate-400 font-medium">
            Tidak ada event yang ditemukan. Silakan tambahkan event baru melalui panel admin.
        </div>
        @endforelse
    </div>
</section>

<section class="bg-slate-100 border-t border-slate-200 py-12 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-xl font-bold text-slate-600 tracking-wide uppercase mb-2">Official Partners</h2>
        <p class="text-sm text-slate-400 mb-8">Platform AmikomEventHub didukung oleh jaringan partner tepercaya</p>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-center">
            @foreach($partners as $partner) 
                <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200 flex flex-col items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="h-10 object-contain mb-2">
                    <span class="text-xs font-bold text-slate-500">{{ $partner->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection