@extends('Admin.layouts.admin')

@section('title', $title)
    
@section('content')
    @parent
    <!-- Main content -->
    <div class="content">
        <div class="card-header">
            <div class="card-tools">
                {{ $posts->links() }} 
            </div>
        </div>
        <div class="card">
            <div class="card-info">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
            </div>
            <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 30%">Заголовок</th>
                        <th style="width: 30%">Slug</th>
                        <th style="width: 5%">Вподобайки</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            <a>
                                {{$post->title}}
                            </a><br>
                            <small>
                                Створено {{$post->created_at}}
                            </small>
                        </td>
                        <td>{{$post->slug}}</td>
                        <td>
                            <i class="nav-icon fas fa-thumbs-up"></i> {{$post->likes}}
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('dashboard.posts.show', ['post' => $post->id]) }}">
                                <i class="fas fa-folder"></i> Див.
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('dashboard.posts.edit', ['post' => $post->id]) }}">
                                <i class="fas fa-pencil-alt"></i> Редаг.
                            </a>
                            <form  action="{{ route('dashboard.posts.destroy', ['post' => $post->id]) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                    <i class="fas fa-trash"></i> Видалити
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection