@extends('layouts.admin')

@section('content')
<div class="max-w-2xl bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    <h1 class="text-2xl font-bold text-slate-900 mb-6">Form Tambah Event</h1>

    <form action="{{ route('admin.events.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1.5">Kategori Event</label>
            <select name="category_id" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 text-sm font-medium" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1.5">Judul / Nama Event</label>
            <input type="text" name="title" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 text-sm" placeholder="Contoh: Concert Music Amikom 2026" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">Tanggal & Waktu</label>
                <input type="datetime-local" name="date" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 text-sm" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">Lokasi / Venue</label>
                <input type="text" name="location" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 text-sm" placeholder="Nama Gedung / Kota" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">Harga Tiket (Rupiah)</label>
                <input type="number" name="price" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 text-sm" placeholder="0 jika gratis" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1.5">Jumlah Kuota Stok Tiket</label>
                <input type="number" name="stock" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 text-sm" placeholder="Jumlah tiket tersedia" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1.5">Deskripsi Singkat Event</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2.5 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 text-sm" placeholder="Tulis rincian informasi acara disini..."></textarea>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.events.index') }}" class="px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 transition">Batal</a>
            <button type="submit" class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-bold hover:bg-indigo-700 shadow-md transition">Simpan Event</button>
        </div>
    </form>
</div>
@endsection