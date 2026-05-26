<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller {
    public function index(Request $request) {
        $search = $request->input('search');
        
        // Logika Soal 3: Sintaks pencarian LIKE 
        $categories = Category::when($search, function($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        })->latest()->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|string|max:255']);
        
        // Otomatis buat slug berdasarkan inputan nama
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        
        return redirect()->back()->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    public function update(Request $request, Category $category) {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->all());
        return redirect()->back()->with('success', 'Kategori Berhasil Diperbarui!');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->back()->with('success', 'Kategori Berhasil Dihapus!');
    }
}