<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    public function index()
    {
        $products = Cart::content();

        // dd($products);
        return view('frontend.shop.checkout')->with([
            'products' => $products
        ]);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->money_total = str_replace(',', '', Cart::total());
        $order->payment_methods = 1;
        $order->user_info = 1;
        $order->status = 0;
        $order->save();

        foreach (Cart::content() as $product) {
            // dd($product->id);
            $order_product = new OrderProduct();
            $order_product->order_id = $order->id;
            $order_product->product_id = $product->id;
            $order_product->so_luong = $product->qty;
            $order_product->unit_price = $product->price;
            $order_product->many_total = $product->price * $product->qty;
            $order_product->save();
        }

        return redirect()->route('frontend.shop.index');
    }
}
