<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul',
        'category_id',
        'author',
        'cover',
        'price',
        'stock',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}




