<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Cart::content();
        $posts = Cache::remember('front_end_posts', 10, function () {
            return Post::Paginate(12);
        });
        // $posts = Post::simplePaginate(12);
        return view('frontend.posts.index')->with([
            'posts' => $posts,
            'products' => $products
        ]);
    }

    public function list(){
        $posts = Post::simplePaginate(12);
        $categories = Category::get();
        $tags = Tag::get();

        return view('frontend.posts.list')->with([
            'posts' => $posts,
            'categories' => $categories,
            'tags' =>$tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::get();
        $post = Post::find($id);
        $categories = Category::get();
        $tags = Tag::get();
        return view('frontend.posts.show')->with([
            'posts' => $posts,
            'post' => $post,
            'categories' => $categories,
            'tags' =>$tags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
