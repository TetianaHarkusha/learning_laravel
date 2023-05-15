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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $post = new Post;
        $post->title = $request->input('title');
        $post->slug = Str::of($request->input('title'))->slug('-');
        $post->text = $request->input('text');
        $post->likes = $request->input('likes');
        $post->save();
        
        return back()->withSuccess('Публікація була успішно додана.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Admin.Pages.post-form', [
            'title' => 'переглянути публікацію',
            'pageName' => 'Переглянути публікацію з id=' . $id,
            'post' => Post::find($id),
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
        return view('Admin.Pages.post-form', [
            'title' => 'змінити публікацію',
            'pageName' => 'Змінити публікацію з id=' . $id,
            'post' => Post::find($id),
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
        $post->title = $request->input('title');
        $post->slug = Str::of($request->input('title'))->slug('-');
        $post->text = $request->input('text');
        $post->likes = $request->input('likes');
        $post->save();
        
        return back()->withSuccess('Публікація була успішно змінена.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return back()->withSuccess('Публікація була успішно видалена.');
    }
}
