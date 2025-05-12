<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    protected $fillable = [
        'book_id',
        'stok_sebelumnya',
        'stok_sekarang',
        'tanggal',
        'keterangan',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
