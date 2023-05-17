<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreUpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Gate::inspect('viewAny', Post::class);
        if ($response->denied()) {
            return back()->with('message',$response->message());
        };

        return view('Admin.Pages.post-table', [
            'title' => 'публікації',
            'pageName' => 'Список публікацій',
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
        $response = Gate::inspect('create', Post::class);
        if ($response->denied()) {
            return back()->with('message', $response->message());
        };

        return view('Admin.Pages.post-form', [
            'title' => 'створити публікацію',
            'pageName' => 'Створити нову публікацію',
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
        $response = Gate::inspect('create', Post::class);
        if ($response->denied()) {
            return back()->with('message',$response->message());
        };

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        $response = Gate::inspect('view', $post);
        if ($response->denied()) {
            return back()->with('message',$response->message());
        };

        return view('Admin.Pages.post-form', [
            'title' => 'переглянути публікацію',
            'pageName' => 'Переглянути публікацію з id=' . $id,
            'post' => $post,
            'method' => 'show',
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
        $post = Post::find($id);

        $response = Gate::inspect('update', $post);
        if ($response->denied()) {
            return back()->with('message',$response->message());
        };

        return view('Admin.Pages.post-form', [
            'title' => 'змінити публікацію',
            'pageName' => 'Змінити публікацію з id=' . $id,
            'post' => $post,
            'method' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\StoreUpdatePostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePostRequest $request, $id)
    {
        $post = Post::find($id);

        $response = Gate::inspect('update', $post);
        if ($response->denied()) {
            return back()->with('message',$response->message());
        };

        $post->title = $request->input('title');
        $post->slug = Str::of($request->input('title'))->slug('-');
        $post->text = $request->input('text');
        $post->likes = $request->input('likes');
        $post->save();
        
        return redirect()->route('dashboard.posts.edit', ['post' => $id])->withSuccess( __('The post was successfully modified.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $response = Gate::inspect('delete', $post);
        if ($response->denied()) {
            return back()->with('message',$response->message());
        };

        Post::destroy($id);

        return back()->withSuccess( __('The post was successfully deleted'));
    }
}
