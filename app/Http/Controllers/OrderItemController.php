<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\OrderItem;
use App\Models\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public static function handleCheckout(Request $request)
    {
        $curId = Cart::getId();
        // dd($request);
        if ($request->total == 0) {
            return redirect()->route('home')->with('failed', 'Your cart is empty, Please add product first');
        }
        foreach ($curId as $id) {
            $transactions = new Transactions();
            $transactions->user_id = $id->id;
            $transactions->total = $request->total;
            $transactions->status = 'Shipping';
            $transactions->transaction_date = Carbon::now()->toDateTimeString();
            $transactions->save();
            $cartItems = CartItems::getCartItemByUser($id->id)->get();
            foreach ($cartItems as $CartItems => $product) {
                $myOrderItem = new OrderItem();
                $myOrderItem->product_id = $product->id;
                $myOrderItem->transaction_id = $transactions->id;
                $myOrderItem->price = $product->price;
                $myOrderItem->quantity = $product->quantity;
                $myOrderItem->save();
            }

            // Delete Cart When Process Checkout
            $cartItems = CartItems::getCartItemByUser($id->id)->delete();
        }

        return redirect()->route('get.transactions')->with('success', 'Checkout Successfully');
    }

    public static function transactionPage()
    {
        $curId = Cart::getId();

        foreach ($curId as $id) {
            $transaction_list = OrderItem::orderBy('transaction_id')
                ->join('transactions', 'transactions.id', '=', 'transaction_id')
                ->join('products', 'products.id', '=', 'product_id')
                ->where('user_id', '=', $id->id)->get();
        }
        return view('page.transaction', ['transaction_list' => $transaction_list]);
    }
}
