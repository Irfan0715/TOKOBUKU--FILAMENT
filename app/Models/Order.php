<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\OrderResource; 

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'book_id',
        'payment_method_id',  
        'order_date',
        'status',
        'subtotal',
        'shipping_cost',
        'vat',
        'discount',
        'total',
    ];

    protected static function booted()
    {
        static::saving(function ($order) {
            $order->total = OrderResource::calculateTotal(
                $order->subtotal ?? 0,
                $order->shipping_cost ?? 0,
                $order->vat ?? 0,
                $order->discount ?? 0
            );
        });
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
