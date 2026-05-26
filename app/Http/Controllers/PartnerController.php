<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller {
    public function index(Request $request) {
        $search = $request->input('search');

        // Logika Soal 3: Sintaks pencarian LIKE 
        $partners = Partner::when($search, function($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        })->latest()->paginate(10);

        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url'
        ]);
        Partner::create($request->all());
        return redirect()->back()->with('success', 'Partner Berhasil Ditambahkan!');
    }

    public function update(Request $request, Partner $partner) {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url'
        ]);
        $partner->update($request->all());
        return redirect()->back()->with('success', 'Partner Berhasil Diperbarui!');
    }

    public function destroy(Partner $partner) {
        $partner->delete();
        return redirect()->back()->with('success', 'Partner Berhasil Dihapus!');
    }
}