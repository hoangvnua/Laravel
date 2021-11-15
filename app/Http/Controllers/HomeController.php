<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        $products_new = Product::where('status', 1)->get();
        $products_hot = Product::where('status', 2);
        return view('frontend.index')->with([
            'posts' => $posts,
            'products_new' => $products_new,
            'products_hot' => $products_hot
        ]);
    }
}
