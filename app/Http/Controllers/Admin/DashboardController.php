<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengembalikan tampilan dashboard utama admin [cite: 569]
        return view('admin.dashboard');
    }
}