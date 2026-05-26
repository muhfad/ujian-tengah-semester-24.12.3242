@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Tiket Saya</h1>
        <p class="text-slate-500 text-sm mt-2">Daftar seluruh tiket acara aktif Anda yang terdaftar di AmikomEventHub.</p>
    </div>

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden p-6 flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="flex-grow">
            <span class="bg-indigo-100 text-indigo-700 font-bold px-3 py-1 rounded-full text-xs">
                Tiket Aktif
            </span>
            <h3 class="text-xl font-bold text-slate-800 mt-3 mb-1">Konser Musik Akbar AMIKOM 2026</h3>
            <p class="text-xs text-slate-400 font-semibold mb-4">📍 Gedung Auditorium Amikom • 📅 30 Juni 2026</p>
            
            <div class="grid grid-cols-2 gap-4 text-xs">
                <div>
                    <p class="text-slate-400 font-medium">Nama Pemesan</p>
                    <p class="text-slate-800 font-bold">Mahasiswa Amikom</p>
                </div>
                <div>
                    <p class="text-slate-400 font-medium">Jenis Tiket</p>
                    <p class="text-slate-800 font-bold">VIP Pass</p>
                </div>
            </div>
        </div>

        <div class="border-t-2 border-dashed md:border-t-0 md:border-l-2 border-slate-200 pt-6 md:pt-0 md:pl-6 flex flex-col items-center justify-center text-center shrink-0 w-full md:w-48">
            <div class="bg-slate-100 border border-slate-200 p-3 rounded-xl mb-2 font-mono text-sm tracking-widest font-bold text-slate-700">
                #AMK-982412
            </div>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Tunjukkan Saat Masuk</p>
        </div>
    </div>
</div>
@endsection