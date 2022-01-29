<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Get the courier associated with the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    function courier()
    {
        return $this->hasOne(Courier::class);
    }

    /**
     * Get the transaction associated with the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    function transaction()
    {
        return $this->hasOne(Transactions::class);
    }

    /**
     * Get the product associated with the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Products::class);
    }
}
