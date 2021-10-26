<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class PostController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $posts_query = DB::table('posts');
        // $posts = Post::where('status', '=', Post::STATUS_DONE)->simplePaginate(5);
        $posts = Post::simplePaginate(5);
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
        $tags = Tag::get();
        return view('backend.posts.create')->with(['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|min:20|max:255',
        //     'content' => 'required',
        // ]);

        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|unique:posts|max:255',
                'content' => 'required',
                'status' => 'required|in:0,1,2',
                'image' => 'file|mimes:jpg,png|max:3072|min:20|dimensions:ratio=1/1'
            ],
            [
                'required' => 'Thuộc tính :attribute là bắt buộc',
                'content.required' => 'Nội dung không được trống',

            ],
            [
                'title' => 'Tiêu đề',
                'content' => 'Nội dung'
            ]
        );

        if ($validator->fails()) {
            return redirect('backend/posts/create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->only(['title', 'content', 'status', 'image']);
        $tags = $request->get('tags');

        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->status = $data['status'];
        $post->user_created_id = Auth::user()->id;
        $post->user_updated_id = Auth::user()->id;
        $post->category_id = 1;

        if ($request->hasFile('image')) {
            $disk = 'public';
            // $path = $request->file('image')->store('blogs', $disk);
            $path = Storage::disk($disk)->putFile('blogs', $request->file('image'));
            $post->disk = $disk;
            $post->image = $path;
        }

        $post->save();

        $post->tags()->attach($tags);

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
        $post = Post::find($id);
        $user = User::get();
        return view('backend.posts.show', [
            'post' => $post,
            'user' => $user
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
        $tags = Tag::get();
        return view('backend.posts.edit')->with([
            'post' => $post,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
        // if (!Gate::allows('update-post', $post)) {
        //     abort(403);
        // }

        // if ($request->user()->cannot('update-post', $post)) {
        //     abort(403);
        // }

        $data = $request->only(['title', 'content', 'status']);
        $tags = $request->get('tags');

        // DB::table('posts')->where('id', $id)->update([
        //     'title' => $data['title'],
        //     'content' => $data['content'],
        //     'status' => $data['status']
        // ]);

        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->status = $data['status'];
        // $post->user_created_id = Auth::user()->id;
        $post->user_updated_id = Auth::user()->id;
        $post->category_id = 1;
        $post->save();

        $post->tags()->sync($tags);
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

        if (Auth::user()->cannot('delete-post')) {
            return abort(403);
        }
        $post = Post::find($id);
        // if (!Gate::allows('delete-post', $post)) {
        //     abort(403);
        // }

        // $post->delete();

        Post::destroy($id);
        return redirect()->route('backend.posts.index');
    }
}
