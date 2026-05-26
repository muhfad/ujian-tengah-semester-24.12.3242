@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-slate-300 h-72 w-full rounded-2xl flex items-center justify-center font-bold text-slate-600 text-xl">[ Banner Event Detail ]</div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Amikom Music Fest 2026 (Event ID: {{ $id }})</h1>
                <p class="text-slate-500 mb-6">Diselenggarakan oleh Event Organizer AMIKOM Yogyakarta</p>
                <hr class="border-slate-100 mb-6">
                <h3 class="text-lg font-bold text-slate-800 mb-2">Deskripsi Event</h3>
                <p class="text-slate-600 leading-relaxed">
                    Nikmati panggung kolaborasi musik terbesar tahun ini yang menghadirkan musisi papan atas nasional langsung di panggung megah Universitas AMIKOM Yogyakarta. Jangan sampai kehabisan kuota!
                </p>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-md border border-slate-200 sticky top-24">
                <h3 class="text-xl font-bold text-slate-900 mb-4">Pilih Kategori Tiket</h3>
                <div class="space-y-3 mb-6">
                    <label class="block p-4 border border-indigo-600 bg-indigo-50/50 rounded-xl cursor-pointer">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-bold text-slate-900">Kategori VIP</p>
                                <p class="text-xs text-slate-500">Tersisa 12 Kuota</p>
                            </div>
                            <span class="font-extrabold text-indigo-600">Rp 300.000</span>
                        </div>
                    </label>
                    <label class="block p-4 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-bold text-slate-900">Kategori Reguler</p>
                                <p class="text-xs text-slate-500">Tersisa 45 Kuota</p>
                            </div>
                            <span class="font-extrabold text-slate-800">Rp 150.000</span>
                        </div>
                    </label>
                </div>
                <a href="{{ route('checkout') }}" class="block w-full text-center bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 shadow-md hover:shadow-indigo-200 transition duration-300">
                    Beli Tiket Sekarang
                </a>
            </div>
        </div>

    </div>
</div>
@endsection