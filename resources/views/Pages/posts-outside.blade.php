@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h3>Тестова сторінка</h3>
    <h5>Публікації з jsonplaceholder.typicode.com</h5>
    
    @isset($posts)
        <x-table class="table table-striped table-sm" :columnNames="$columnNames" :records="$posts"></x-table>
    @endisset
@endsection
