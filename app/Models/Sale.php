<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;
use App\Models\PaymentMethod;

class Sale extends Model
{
    protected $fillable = [
        'book_id',
        'quantity',
        'total_price',
        'payment_method_id',
        'sale_date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

}
