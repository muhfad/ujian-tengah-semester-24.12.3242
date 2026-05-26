@extends('layouts.admin') @section('content')
<h1 class="text-3xl font-extrabold text-slate-900 mb-6">Ringkasan Penjualan</h1>

<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <p class="text-sm font-medium text-slate-500 uppercase">Total Event Aktif</p>
        <p class="text-3xl font-black text-slate-900 mt-1">12 Event</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <p class="text-sm font-medium text-slate-500 uppercase">Tiket Terjual</p>
        <p class="text-3xl font-black text-emerald-600 mt-1">1,420 Tiket</p>
    </div>
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <p class="text-sm font-medium text-slate-500 uppercase">Pendapatan Bersih</p>
        <p class="text-3xl font-black text-indigo-600 mt-1">Rp 213,5 Jt</p>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="p-5 font-bold text-slate-800 border-b border-slate-100">Log Aktivitas Booking Terbaru</div>
    <div class="p-6 text-center text-slate-400 text-sm">
        [ Data Transaksi Real-time Akan Muncul di Pertemuan Berikutnya Menggunakan Database Migration & ORM ]
    </div>
</div>
@endsection