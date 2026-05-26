@extends('layouts.admin')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Kategori</h1>
        
        <form action="{{ route('admin.categories.index') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..." class="px-4 py-2 border rounded-xl text-sm focus:outline-none focus:border-indigo-600">
            <button type="submit" class="bg-slate-800 text-white px-4 py-2 rounded-xl text-sm hover:bg-slate-700">Cari</button>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 text-emerald-700 p-3 rounded-xl mb-4 text-sm font-semibold">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl border shadow-sm h-fit">
            <h2 class="text-lg font-bold mb-4 text-slate-700">Tambah Kategori</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-slate-600 mb-2">Nama Kategori</label>
                    <input type="text" name="name" class="w-full px-4 py-2.5 border rounded-xl focus:outline-none focus:border-indigo-600 text-sm" required>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-xl text-sm transition">Simpan Kategori</button>
            </form>
        </div>

        <div class="lg:col-span-2 bg-white rounded-2xl border shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b text-slate-600 font-semibold text-sm">
                        <th class="p-4 w-16 text-center">ID</th>
                        <th class="p-4">Nama Kategori</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm text-slate-700">
                    @forelse($categories as $category)
                    <tr>
                        <td class="p-4 text-center text-slate-400">{{ $category->id }}</td>
                        <td class="p-4 font-bold">{{ $category->name }}</td>
                        <td class="p-4 flex justify-center space-x-2">
                            <button onclick="showEditPrompt('{{ $category->id }}', '{{ $category->name }}')" class="text-amber-600 hover:bg-amber-50 py-1 px-3 border border-amber-200 rounded-lg transition">Edit</button>
                            
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:bg-rose-50 py-1 px-3 border border-rose-200 rounded-lg transition">Hapus</button>
                            </form>

                            <form id="edit-form-{{ $category->id }}" action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="hidden">
                                @csrf @method('PUT')
                                <input type="hidden" name="name" id="edit-input-{{ $category->id }}">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="p-4 text-center text-slate-400">Data Kosong.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4 bg-slate-50/50">{{ $categories->links() }}</div>
        </div>
    </div>
</div>

<script>
    function showEditPrompt(id, oldName) {
        let newName = prompt("Ubah Nama Kategori:", oldName);
        if (newName != null && newName.trim() !== "") {
            document.getElementById('edit-input-' + id).value = newName;
            document.getElementById('edit-form-' + id).submit();
        }
    }
</script>
@endsection