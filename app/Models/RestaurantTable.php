<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class RestaurantTable extends Model
{
    /** @use HasFactory<\Database\Factories\RestaurantTableFactory> */
    use HasFactory;

    protected $table = 'restaurant_tables';

    protected $fillable = [
        'number',
        'status',
        'seats',
        'location',
        'qr_code',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'restaurant_table_id');
    }


}
