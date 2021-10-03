<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $posts = Post::where('status', '=', Post::STATUS_DONE)->simplePaginate(5);
        $title = $request->get('title');
        $status = $request->get('status');
        if (!empty($title)) {
            $posts = Post::where('title', 'like', '%' . $title . '%')->where('status', '=', Post::STATUS_DONE)->simplePaginate(5);
        }
        if ($status !== null) {
            $posts = Post::where('status', $status)->where('status', '=', Post::STATUS_DONE)->simplePaginate(5);
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

        // try {
        //     $insert = DB::table('posts')->insertGetId([
        //         'title' => $data['title'],
        //         'slug' => Str::slug($data['title']),
        //         'content' => $data['content'],
        //         'status' => $data['status'],
        //         'img_url' => 'ảnh ảo',
        //         'user_created_id' => 1,
        //         'user_updated_id' => 1,
        //         'category_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ]);
        // } catch (Exception $ex) {
        //     Log::error("PostsController@store Error" . $ex->getMessage());
        // }
        // DB::table('post_tag')->insert([
        //     'post_id' => $insert,
        //     'tag_id' => 3
        // ]);

        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->status = $data['status'];
        $post->user_created_id = 1;
        $post->user_updated_id = 1;
        $post->category_id = 1;
        $post->save();

        

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
    public function edit(Request $request, $id)
    {
        // $post = DB::table('posts')->find($id);
        $post = Post::find($id);
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

        // DB::table('posts')->where('id', $id)->update([
        //     'title' => $data['title'],
        //     'content' => $data['content'],
        //     'status' => $data['status']
        // ]);

        $post = Post::find($id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->status = $data['status'];
        $post->user_created_id = 1;
        $post->user_updated_id = 1;
        $post->category_id = 1;
        $post->save();

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
        // $post = Post::find($id);
        // $post->delete();
        Post::destroy($id);
        return redirect()->route('backend.posts.index');
    }
}
