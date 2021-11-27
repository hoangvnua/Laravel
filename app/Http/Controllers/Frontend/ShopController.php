<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return view('frontend.shop.index')->with([
            'products' => $products
        ]);
    }

    public function list()
    {
        $products = Product::paginate(12);
        $categories = Category::get();
        $tags = Tag::get();
        return view('frontend.shop.list')->with([
            'products' => $products,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::get();
        $product = Product::find($id);
        // dd($product->category);
        return view('frontend.shop.show')->with([
            'products' => $products,
            'product' => $product
        ]);
    }
}
