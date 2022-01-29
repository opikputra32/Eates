<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    function cart_item()
    {
        return $this->belongsTo(CartItems::class);
    }

    function order_item()
    {
        return $this->belongsTo(OrderItem::class);
    }
}
