<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $posts_query = DB::table('posts');
        $posts = Post::get();
        $title = $request->get('title');
        $status = $request->get('status');
        if (!empty($title)) {
            $posts = Post::where('title', 'like', '%' . $title . '%')->get();
        }
        if ($status !== null) {
            $posts = Post::where('status', $status)->get();
        }

        // $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
        return view('backend.posts.index')->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'content', 'status']);

        try {
            $insert = DB::table('posts')->insert([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'content' => $data['content'],
                'status' => $data['status'],
                'img_url' => 'ảnh ảo',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (Exception $ex) {
            Log::error("PostsController@store Error" . $ex->getMessage());
        }


        return redirect()->route('backend.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::table('posts')->find($id);
        return view('backend.posts.show', [
            'post' => $post
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
        $post = DB::table('posts')->find($id);

        return view('backend.posts.edit')->with([
            'post' => $post
        ]);
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
        $data = $request->only(['title', 'content', 'status']);

        DB::table('posts')->where('id', $id)->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => $data['status']
        ]);
        return redirect()->route('backend.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posts')->where('id', $id)->delete();

        return redirect()->route('backend.posts.index');
    }
}
