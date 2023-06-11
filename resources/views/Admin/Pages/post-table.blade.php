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
                @if (session('message'))
                    <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="true">×</button>
                        <h4><i class="icon fa fa-info-circle"></i>{{ session('message') }}</h4>
                    </div>  
                @endif
            </div>
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
                        <th style="width: 25%">{{ __('Title') }}</th>
                        <th style="width: 25%">Slug</th>
                        <th style="width: 10%">{{ __('Author') }}</th>
                        <th style="width: 5%">{{ __('Likes') }}</th>
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
                                {{ __('Created')}} {{$post->created_at}}
                            </small>
                        </td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            {{$post->likes}}<br>
                            <div class="row gx-5">
                            <div class="col">
                                <a class="nav-icon fas fa-thumbs-up" href="{{ route('dashboard.posts.like', ['post' => $post]) }}"></a>  
                            </div>
                            <div class="col">     
                                <a class="nav-icon fas fa-thumbs-down" href="{{ route('dashboard.posts.like', ['post' => $post, 'mark' => -1]) }}"></a>
                            </div>
                            </div>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('dashboard.posts.show', ['post' => $post]) }}">
                                <i class="fas fa-folder"></i> {{ __('View') }}
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('dashboard.posts.edit', ['post' => $post]) }}">
                                <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                            </a>
                            <form class="form-btn" action="{{ route('dashboard.posts.destroy', ['post' => $post]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                    <i class="fas fa-trash"></i> {{ __('Delete') }}
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