<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    // Tambahkan 'slug' di dalam array fillable agar diizinkan masuk ke database
    protected $fillable = ['name', 'slug']; 
}