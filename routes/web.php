<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

/*
|--------------------------------------------------------------------------
| Web Routes - Eventify Application
|--------------------------------------------------------------------------
*/

// --- RUTE SISI PENGGUNA (USER AREA) --- [cite: 571]
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

// --- RUTE SISI ADMINISTRATOR (ADMIN PANEL) --- [cite: 573]
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Rute CRUD Resource otomatis untuk Event
    Route::resource('events', AdminEventController::class);
});