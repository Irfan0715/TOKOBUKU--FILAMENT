<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama', 'kode_kategori'];

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->kode_kategori = 'KATEGORI-' . str_pad((Category::count() + 1), 3, '0', STR_PAD_LEFT);
        });
    }

}
