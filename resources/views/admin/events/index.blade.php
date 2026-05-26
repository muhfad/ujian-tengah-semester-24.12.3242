@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-black text-slate-900">Manajemen Konten Event</h1>
    <a href="{{ route('admin.events.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-md transition text-sm">
        + Tambah Event Baru
    </a>
</div>

@if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 text-sm font-semibold">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-semibold text-sm">
                <th class="p-4 w-12 text-center">No</th>
                <th class="p-4">Nama Event</th>
                <th class="p-4">Kategori</th>
                <th class="p-4">Tanggal</th>
                <th class="p-4">Harga Tiket</th>
                <th class="p-4">Stok</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
            @forelse($events as $index => $event)
            <tr class="hover:bg-slate-50/70 transition">
                <td class="p-4 text-center text-slate-400">{{ $events->firstItem() + $index }}</td>
                <td class="p-4 font-bold text-slate-900">{{ $event->title }}</td>
                <td class="p-4"><span class="bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-md text-xs font-bold">{{ $event->category->name }}</span></td>
                <td class="p-4 text-slate-500">{{ \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') }}</td>
                <td class="p-4 text-slate-900">Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                <td class="p-4 text-slate-500">{{ $event->stock }} Pcs</td>
                <td class="p-4 flex justify-center space-x-2">
                    <a href="{{ route('admin.events.edit', $event->id) }}" class="text-amber-600 hover:bg-amber-50 py-1.5 px-3 rounded-lg border border-amber-200 transition">Edit</a>
                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-rose-600 hover:bg-rose-50 py-1.5 px-3 rounded-lg border border-rose-200 transition">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-8 text-center text-slate-400">Belum ada data event tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4 border-t border-slate-100 bg-slate-50/50">
        {{ $events->links() }}
    </div>
</div>
@endsection