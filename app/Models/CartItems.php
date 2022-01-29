<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;

    function cart()
    {
        return $this->hasMany(Cart::class);
    }
    function courier()
    {
        return $this->hasMany(Courier::class);
    }
    function product()
    {
        return $this->hasMany(Products::class);
    }
    public static function getCartItemByUser($user_id)
    {
        return CartItems::join('carts', 'carts.id', '=', 'cart_id')
            ->join('products', 'products.id', '=', 'product_id')
            ->where('user_id', '=', $user_id);
    }

    public static function getCartItemByUserAndProduct($user_id, $product_id)
    {
        return CartItems::getCartItemByUser($user_id)
            ->where('product_id', '=', $product_id)
            ->first();
    }

    public static function getCartItemByRequestProductAndUser($request_product_id, $user_id)
    {
        return CartItems::where('product_id', $request_product_id)->where('cart_id', '=', $user_id)->first();
    }
}
