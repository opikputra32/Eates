<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Courier;
use Illuminate\Http\Request;

class CartItemsController extends Controller
{
    public static function handleCart(Request $request)
    {
        // dd($request);
        $request->validate([
            'quantity' => 'required|gt:0'
        ]);

        $curId = Cart::getId();
        foreach ($curId as $id) {
            /**
             * return true @if data not duplicate
             * return false @if data duplicate => then Update Existing Data
             */
            $duplicate = CartItems::where('product_id', $request->id)->where('cart_id', '=', $id->id)->exists();
            if ($duplicate == null) {
                $myCartItems = new CartItems();
                $myCartItems->cart_id = $id->id;
                $myCartItems->product_id = $request->id;
                $myCartItems->product_price = $request->productPrice * $request->quantity;
                $myCartItems->quantity = $request->quantity;
                $myCartItems->save();
            } else {
                $myCartItems = CartItems::getCartItemByRequestProductAndUser($request->id, $id->id);
                $myCartItems->quantity += $request->quantity;
                $myCartItems->product_price = $request->productPrice * $myCartItems->quantity;
                $myCartItems->save();
            }
        }

        return redirect()->route('get.cart')->with('success', 'Insert Product Successfully');
    }

    public static function cartPage()
    {
        $curId = Cart::getId();

        foreach ($curId as $id) {
            $cartItems = CartItems::getCartItemByUser($id->id)->get();
            $isCartItemExists = CartItems::getCartItemByUser($id->id)->exists();
        }
        $total = 0;
        foreach ($cartItems as $CartItems => $product) {
            $total += $product->product_price;
        }
        return view(
            'page.my_cart',
            [
                'cartItems' => $cartItems,
                'total' => $total,
                'isCartItemExists' => $isCartItemExists,
                'couriers' => Courier::get()
            ]

        );
    }

    public static function editPage($id)
    {
        // Get Current Id
        $curId = Cart::getId();

        foreach ($curId as $user) {
            // Get Data and Pass to Blade
            $cartItems = CartItems::getCartItemByUserAndProduct($user->id, $id);
        }
        return view('page.detail_update', ['product' => $cartItems]);
    }

    public static function handleUpdate(Request $request)
    {
        $request->validate([
            'quantity' => 'required|gt:0'
        ]);

        // Get Current Id
        $curId = Cart::getId();
        foreach ($curId as $id) {
            // Get CartItems then Update
            $myCartItems = CartItems::getCartItemByRequestProductAndUser($request->id, $id->id);
            $myCartItems->product_price = $request->productPrice * $request->quantity;
            $myCartItems->quantity = $request->quantity;
            $myCartItems->save();
        }

        return redirect()->route('get.cart')->with('success', 'Product updated successfully');
    }

    public static function handleDelete(Request $request)
    {

        $curId = Cart::getId();

        foreach ($curId as $id) {
            CartItems::getCartItemByRequestProductAndUser($request->id, $id->id)->delete();
        }
        return redirect()->route('get.cart')->with('success', 'Product deleted successfully');
    }
}
