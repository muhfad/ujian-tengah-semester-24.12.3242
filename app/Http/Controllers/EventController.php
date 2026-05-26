<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show($id)
    {
        // Menampilkan halaman detail event berdasarkan ID [cite: 559]
        return view('event-detail', compact('id'));
    }

    public function checkout()
    {
        // Menampilkan halaman proses booking tiket [cite: 559]
        return view('checkout');
    }

    public function ticket()
    {
        // Menampilkan halaman tiket fisik user [cite: 560]
        return view('ticket');
    }

    public function indexAdmin()
    {
        // Menampilkan daftar event khusus di panel admin [cite: 569]
        return view('admin.events');
    }
}