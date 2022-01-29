<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    function cart_items()
    {
        return $this->belongsTo(CartItems::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }



    public static function getId()
    {
        return Cart::select('id')->where('user_id', Auth::user()->id)->get();
    }
}
