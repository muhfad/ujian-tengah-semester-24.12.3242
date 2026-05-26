<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        // Mengambil query dasar event
        $eventQuery = Event::with('category')->where('date', '>=', now());

        // Logika 1: Filter berdasarkan kategori (jika ada)
        if ($request->has('category') && $request->category != '') {
            $eventQuery->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        // Logika 2: Filter berdasarkan teks pencarian (search bar)
        if ($request->has('search') && $request->search != '') {
            $eventQuery->where('title', 'LIKE', '%' . $request->search . '%');
        }

        $events = $eventQuery->orderBy('date', 'asc')->get();

        return view('welcome', compact('categories', 'events'));
    }
}