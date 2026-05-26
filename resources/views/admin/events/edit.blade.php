@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <h2 class="text-2xl font-bold text-slate-800 mb-6">Edit Event</h2>

        <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Judul Event</label>
                    <input type="text" name="title" value="{{ old('title', $event->title) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-sm focus:outline-indigo-600" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
                    <select name="category_id" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-sm focus:outline-indigo-600" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-sm focus:outline-indigo-600">{{ old('description', $event->description) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal & Waktu</label>
                        <input type="datetime-local" name="date" value="{{ old('date', date('Y-m-d\TH:i', strtotime($event->date))) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-sm focus:outline-indigo-600" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Lokasi</label>
                        <input type="text" name="location" value="{{ old('location', $event->location) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-sm focus:outline-indigo-600" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="price" value="{{ old('price', $event->price) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-sm focus:outline-indigo-600" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Stok Tiket</label>
                        <input type="number" name="stock" value="{{ old('stock', $event->stock) }}" class="w-full px-3 py-2 border border-slate-200 rounded-xl text-sm focus:outline-indigo-600" required>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('admin.events.index') }}" class="px-4 py-2 border border-slate-200 text-slate-600 text-sm font-medium rounded-xl hover:bg-slate-50">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-xl hover:bg-indigo-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection