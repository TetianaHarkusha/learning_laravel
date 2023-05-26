<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreUpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Str;

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
        $post->likes = $request->input('likes');
        $post->user_id = $request->user()->user_id;
        $post->save();
        
        return back()->withSuccess( __('The post was successfully added.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('Admin.Pages.post-form', [
            'title' => 'view post',
            'pageName' => __('View post with') .' id= ' . $post->id,
            'post' => $post,
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
        return view('Admin.Pages.post-form', [
            'title' => 'edit post',
            'pageName' =>  __('Edit post with') .' id= ' . $post->id,
            'post' => $post,
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
        $post->likes = $request->input('likes');
        $post->save();
        
        return redirect()->route('dashboard.posts.edit', ['post' => $post->id])->withSuccess( __('The post was successfully modified.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post);

        return back()->withSuccess( __('The post was successfully deleted'));
    }
}
