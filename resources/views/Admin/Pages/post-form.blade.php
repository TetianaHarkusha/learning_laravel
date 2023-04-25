@extends('Admin.layouts.admin')

@section('title', $title)
    
@section('content')
    @parent
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form class="form-horizontal" method="POST">
                            <div class="card-body">
                            @csrf
                            @if ($method == 'show')
                            <div class="form-group row">
                                <label for="inputId" class="col-sm-2 col-form-label">Ідентифікатор</label>
                                <div class="col-sm-10">
                                <input type="text" name="id" readonly class="form-control" id="inputId" 
                                    value="{{old('id') ?? $post->id ?? ''}}" placeholder="Ідентифікатор (не заповнювати)">
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="inputTitle" class="col-sm-2 col-form-label">Заголовок</label>
                                <div class="col-sm-10">
                                <input type="text" name="title" @if($method == 'show') readonly @endif class="form-control" id="inputTitle" 
                                    value="{{old('title') ?? $post->title ?? ''}}" placeholder="Заголовок публікації">
                                </div>
                            </div>
                            @if ($method == 'show')
                            <div class="form-group row">
                                <label for="inputSlug" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-10">
                                <input type="text" name="slug" readonly class="form-control" id="inputSlug" 
                                    value="{{old('slug') ?? $post->slug ?? ''}}" placeholder="slug">
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="text" class="col-sm-2 col-form-label">Вміст</label>
                                <div class="col-sm-10">
                                <textarea name="text" id="text" class="form-control" rows="5" @if($method == 'show') readonly @endif 
                                    placeholder="Введіть текс публікації...">{{old('text') ?? $post->text ?? ''}}</textarea>  
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLikes" class="col-sm-2 col-form-label">Вподобайки</label>
                                <div class="col-sm-10">
                                <input type="text" name="likes" @if($method == 'show') readonly @endif class="form-control" id="inputLikes" 
                                    value="{{old('likes') ?? $post->likes ?? 0}}" placeholder="Кількість вподобайок">
                                </div>
                            </div>
                            @if ($method == 'show')
                            <div class="form-group row">
                                <label for="created_at" class="col-sm-2 col-form-label">Дата створення</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="created_at" value="{{ $post->created_at }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="update_at" class="col-sm-2 col-form-label">Дата змін</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control" id="update_at" value="{{ $post->updated_at }}">
                                </div>
                            </div>
                            @endif                        
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            @if ($method == 'create')
                            <button type="submit" class="btn btn-info" formmethod="post" formaction="{{ route('dashboard.posts.store') }}">
                                <i class="fas fa-sd-card"></i> Зберегти
                            </button>
                            @endif
                            @if ($method == 'edit')
                            @method('PATCH')
                            <button type="submit" class="btn btn-info" formaction="{{ route('dashboard.posts.update', ['post' => $post->id]) }}">
                                <i class="fas fa-sd-card"></i> Зберегти зміни
                            </button>
                            @endif
                            @if ($method == 'show')
                            <button type="submit" class="btn btn-info" formmethod="get" formaction="{{ route('dashboard.posts.edit', ['post' => $post->id]) }}">
                                <i class="fas fa-pencil-alt"></i> Редагувати
                            </button>
                            @endif
                            <button type="submit" class="btn btn-secondary float-right" formmethod="get" formaction="{{ route('dashboard.main') }}">
                                <i class="fas fa-ban"></i> Вийти
                            </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->          
        </div><!-- /.container-fluid -->
    </section>
@endsection
