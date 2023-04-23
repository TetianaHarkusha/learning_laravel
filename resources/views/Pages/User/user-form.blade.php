@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h3> {{$topic}} </h3>
    <div class="col-6">
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <x-form action="{{ route($action) }}" method="post" :record="$user">
            <x-slot:div class="input-group mb-3"></x-slot:div>
            <x-slot:span class="col-sm-3 input-group-text" id="inputGroup-sizing-lg"></x-slot:span>
            <x-slot:input class="form-control"></x-slot:input>
        </x-form> 
    </div> 
@endsection
