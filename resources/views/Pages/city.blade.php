@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h3> {{$topic}} </h3>
    
    @isset($countries)
        {{ $countries->links() }}
        @include('includes.table')
        {{ $countries->links() }}
    @endisset

    @isset($cities)
        {{ $cities->links() }}
        <x-table class="table table-striped table-sm" :columnNames="$columnNames" :records="$cities"></x-table>
        {{ $cities->links() }}
    @endisset

@endsection