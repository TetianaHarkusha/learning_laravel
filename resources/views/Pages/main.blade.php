@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Головна сторінка</h1>
    <h2>Main page</h2>
    <h3>Це мій навчальній проект на <b>Laravel</b></h3> 
    <div class="card-body">   
        @if (session('message'))
            <div class="alert alert-warning d-flex bd-highlight" role="alert">
                <svg class="bd-highlight bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div class="flex-grow-1 bd-highlight"><h5>{{ session('message') }}</h5></div>
                <button type="button" class="bd-highlight btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
        @endif
    </div>
@endsection