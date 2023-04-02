@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    {!!$content!!}

    @isset($users)

        @if(!isset($id) or $id < 15) {{ $users->links() }} @endif
        <x-table :columnNames="$columnNames" :users="$users"></x-table>

    @endisset
  
@endsection
