<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RestaurantTable;
use App\Models\OrderItem;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'client_id',
        'restaurant_table_id',
        'total_price',
        'status',
    ];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function restaurantTable()
    {
        return $this->belongsTo(RestaurantTable::class, 'restaurant_table_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
