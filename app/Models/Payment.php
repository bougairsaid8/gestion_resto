<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'status',
        'transaction_id',
        'paid_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
