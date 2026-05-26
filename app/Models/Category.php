<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relasi One-to-Many: Satu kategori memiliki banyak Event
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}