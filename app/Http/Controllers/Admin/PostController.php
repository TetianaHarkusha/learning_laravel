<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreUpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Pages.post-table', [
            'title' => 'posts',
            'pageName' => __('List') . ' ' . __('of posts'),
            'posts' => Post::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Pages.post-form', [
            'title' => 'create',
            'pageName' => __('Create a new post'),
            'method' => 'create',
            'action' => 'dashboard.posts.store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Admin\StoreUpdatePostRequest $request
     * @return Illuminate\Http\Response;
     */
    public function store(StoreUpdatePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->slug = Str::of($request->input('title'))->slug('-');
        $post->text = $request->input('text');
        $post->likes = 0;
        $post->user_id = $request->user()->user_id;
        $post->save();

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('images','post' . $post->id . '.jpg', 'public');
        }

        Storage::put('docs/post' . $post->id . '.txt', $post->title . "\r\n" . $post->text);

        return redirect()->route('dashboard.posts.show', ['post' => $post->id])->withSuccess(__('The post was successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $image = 'images/post' . $post->id . '.jpg';
        if (Storage::missing($image)) {
            unset($image);
        };
        
        $file = 'docs/post' . $post->id . '.txt';
        if (Storage::missing($file)) {
            unset($file);
        };  

        return view('Admin.Pages.post-form', [
            'title' => 'view post',
            'pageName' => __('View post with') . ' id=' . $post->id,
            'post' => $post,
            'image' => $image ?? Null,
            'file' => $file ?? Null,
            'method' => 'show',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $image = 'images/post' . $post->id . '.jpg';
        if (Storage::missing($image)) {
            unset($image);
        };  
        
        return view('Admin.Pages.post-form', [
            'title' => 'edit post',
            'pageName' =>  __('Edit post with') . ' id= ' . $post->id,
            'post' => $post,
            'image' => $image ?? Null,
            'method' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\StoreUpdatePostRequest  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePostRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->slug = Str::of($request->input('title'))->slug('-');
        $post->text = $request->input('text');
        $post->save();

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('images','post' . $post->id . '.jpg', 'public');
        }

        Storage::put('docs/post' . $post->id . '.txt', $post->title . "\r\n" . $post->text);
    
        return redirect()->route('dashboard.posts.show', ['post' => $post->id])->withSuccess( __('The post was successfully modified.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        Storage::delete(['images/post' . $post->id . '.jpg', 'docs/post' . $post->id . '.txt']);

        return back()->withSuccess(__('The post was successfully deleted'));
    }

    /**
     * Adds one like/dislike
     *
     * @param  \App\Models\Post $post
     * @param int $mark
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function like(Post $post, Request $request, $mark = Null)
    {
        $executed = RateLimiter::attempt(
            'post-like:user_login' . $request->user()->id . 'post' . $post->id,
            $perDay = 1,
            function() use ($post, $mark) {
                $mark? $post->decrement('likes'): $post->increment('likes');
                $post->save();
            },
            86400
        );
        if (!$executed) {
            $seconds = RateLimiter::availableIn('post-like:user_login' . $request->user()->id . 'post' . $post->id);
            return back()->with('message', __('You can only give one reaction per day!') . ' (' . $seconds . __('s ') . __('left') . ')');
        };

        return back()->withSuccess( __('The reaction was added.'));
    }

    /**
     * Download the txt-file of the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function download(Post $post)
    {
        $file = 'docs/post' . $post->id . '.txt';
        if (Storage::exists($file)) {
            return Storage::download($file);
        };

        return back();
    }
}
