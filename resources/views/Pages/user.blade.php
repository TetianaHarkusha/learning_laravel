@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h3> {{$topic}} </h3>

    @isset($users)

        @if(!isset($id) or $id < 15) {{ $users->links() }} @endif
        <x-table class="table table-striped" :columnNames="$columnNames" :records="$users"></x-table>

    @endisset
  
@endsection
