<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        $products_new = Product::where('status', 1)->get();
        $products_hot = Product::where('status', 2)->get();
        $products = Cart::content();
        return view('frontend.index')->with([
            'posts' => $posts,
            'products_new' => $products_new,
            'products_hot' => $products_hot,
            'products' => $products
        ]);
    }
}
