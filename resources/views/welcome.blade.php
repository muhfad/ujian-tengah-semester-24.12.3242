@extends('layouts.app')

@section('content')
<section class="bg-slate-100 border-t border-slate-200 py-12 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-xl font-bold text-slate-600 tracking-wide uppercase mb-2">Official Partners</h2>
        <p class="text-sm text-slate-400 mb-8">Platform AmikomEventHub didukung oleh jaringan partner tepercaya</p>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-center">
            @foreach($partners as $partner) <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200 flex flex-col items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="h-10 object-contain mb-2">
                    <span class="text-xs font-bold text-slate-500">{{ $partner->name }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection