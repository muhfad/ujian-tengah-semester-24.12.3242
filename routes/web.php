<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController; // Controller untuk Sisi Pengunjung (Halaman Detail, Checkout, Tiket)
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController; // Controller untuk Admin CRUD (Diberi Alias)
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartnerController;

/*
|--------------------------------------------------------------------------
| Web Routes - Eventify Application
|--------------------------------------------------------------------------
*/

// ==========================================
// --- RUTE SISI PENGGUNA (PUBLIC / USER AREA) ---
// ==========================================

// Halaman Utama / Jelajahi Event
Route::get('/', [HomeController::class, 'index'])->name('home');

// Detail Event, Form Booking, dan Tiket Saya
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// ==========================================
// --- RUTE SISI ADMINISTRATOR (ADMIN PANEL) ---
// ==========================================
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Dashboard Admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Manajemen Event (Menggunakan AdminEventController)
    Route::resource('events', AdminEventController::class);
    
    // CRUD Kategori Event
    Route::resource('categories', CategoryController::class);
    
    // CRUD Partner Terpercaya
    Route::resource('partners', PartnerController::class);
});