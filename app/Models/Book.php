<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'kode_buku',
        'judul',
        'category_id',
        'stock',
        'harga_beli',
        'harga_jual',
        'cover',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}




