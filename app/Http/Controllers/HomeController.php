<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Partner; // PENTING: Import Model Partner di sini
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua kategori untuk komponen filter tab
        $categories = Category::all();

        // 2. Ambil semua partner untuk section bagian bawah (Soal 4 UTS)
        $partners = Partner::all(); // Variabel $partners didefinisikan di sini

        // 3. Ambil query dasar untuk event
        $eventQuery = Event::with('category')->where('date', '>=', now());

        // Logika Filter berdasarkan kategori
        if ($request->has('category') && $request->category != '') {
            $eventQuery->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        // Logika Filter berdasarkan teks pencarian
        if ($request->has('search') && $request->search != '') {
            $eventQuery->where('title', 'LIKE', '%' . $request->search . '%');
        }

        $events = $eventQuery->orderBy('date', 'asc')->get();

        // PENTING: Kirimkan $partners ke view welcome
        return view('welcome', compact('categories', 'events', 'partners'));
    }
}