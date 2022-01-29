<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    public $timestamps = false;


    /**
     * Get the order_item that owns the Transactions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_item()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
