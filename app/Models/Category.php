<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['kode_kategori', 'nama'];

    public function books()
    {
        return $this->hasMany(Book::class, 'category_id', 'id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}


