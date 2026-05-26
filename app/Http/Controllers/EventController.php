<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;


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

    /**
 * Menampilkan halaman form edit event
 */
public function edit(Event $event)
{
    $categories = Category::all();
    return view('admin.events.edit', compact('event', 'categories'));
}

/**
 * Memproses perubahan data event ke database
 */
public function update(Request $request, Event $event)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'location' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

    $event->update([
        'title' => $request->title,
        'category_id' => $request->category_id,
        'description' => $request->description,
        'date' => $request->date,
        'location' => $request->location,
        'price' => $request->price,
        'stock' => $request->stock,
    ]);

    return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui!');
}

/**
 * Menghapus data event dari database
 */
public function destroy(Event $event)
{
    $event->delete();
    return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus!');
}
}