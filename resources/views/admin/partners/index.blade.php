@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Partner</h1>
        
        <form action="{{ route('admin.partners.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari partner..." class="px-4 py-2 border rounded-xl text-sm focus:outline-none focus:border-indigo-600">
            <button type="submit" class="bg-slate-800 text-white px-4 py-2 rounded-xl text-sm hover:bg-slate-700">Cari</button>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 text-emerald-700 p-3 rounded-xl mb-4 text-sm font-semibold">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border shadow-sm h-fit">
            <h2 class="text-lg font-bold mb-4 text-slate-700">Tambah Partner</h2>
            <form action="{{ route('admin.partners.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-semibold text-slate-600 mb-1">Nama Partner</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:border-indigo-600 text-sm" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-600 mb-1">URL Logo Partner</label>
                    <input type="url" name="logo_url" placeholder="https://example.com/logo.png" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:border-indigo-600 text-sm" required>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-xl text-sm transition">Simpan Partner</button>
            </form>
        </div>

        <div class="lg:col-span-2 bg-white rounded-2xl border shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b text-slate-600 font-semibold text-sm">
                        <th class="p-4">Logo</th>
                        <th class="p-4">Nama Partner</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm text-slate-700">
                    @forelse($partners as $partner)
                    <tr>
                        <td class="p-4"><img src="{{ $partner->logo_url }}" alt="Logo" class="h-8 object-contain"></td>
                        <td class="p-4 font-bold">{{ $partner->name }}</td>
                        <td class="p-4 flex justify-center space-x-2">
                            <button onclick="showEditPartner('{{ $partner->id }}', '{{ $partner->name }}', '{{ $partner->logo_url }}')" class="text-amber-600 hover:bg-amber-50 py-1 px-3 border border-amber-200 rounded-lg transition">Edit</button>
                            
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Hapus partner ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:bg-rose-50 py-1 px-3 border border-rose-200 rounded-lg transition">Hapus</button>
                            </form>

                            <form id="edit-partner-form-{{ $partner->id }}" action="{{ route('admin.partners.update', $partner->id) }}" method="POST" class="hidden">
                                @csrf @method('PUT')
                                <input type="hidden" name="name" id="edit-pname-{{ $partner->id }}">
                                <input type="hidden" name="logo_url" id="edit-plogo-{{ $partner->id }}">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-4 text-center text-slate-400">Data Kosong.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function showEditPartner(id, oldName, oldLogo) {
        let newName = prompt("Ubah Nama Partner:", oldName);
        if (newName) {
            let newLogo = prompt("Ubah URL Logo Partner:", oldLogo);
            if (newLogo) {
                document.getElementById('edit-pname-' + id).value = newName;
                document.getElementById('edit-plogo-' + id).value = newLogo;
                document.getElementById('edit-partner-form-' + id).submit();
            }
        }
    }
</script>
@endsection