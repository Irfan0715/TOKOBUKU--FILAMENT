<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'book_id',
        'jumlah',
        'harga_beli',
        'tanggal',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

