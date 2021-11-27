<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $products = Cart::content();
        return view('frontend.shop.cart')->with([
            'products' => $products
        ]);
    }

    public function create($id)
    {
        $product = Product::find($id);

        Cart::add($product->id, $product->name, 1, $product->sale_price, 0, [
            'image' => '/frontend/images/product/default/home-1/default-1.jpg'
        ]);

        return redirect()->route('frontend.cart');
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('frontend.cart');
    }

    public function increase($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        return redirect()->route('frontend.cart');
    }

    public function decrease($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        return redirect()->route('frontend.cart');
    }
}
