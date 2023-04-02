@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    {!!$content!!}
    @isset($users)
        <x-table :columnNames="$columnNames" :users="$users"></x-table>
    @endisset
  
@endsection
