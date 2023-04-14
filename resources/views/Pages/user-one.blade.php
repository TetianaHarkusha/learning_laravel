@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h3> {{$topic}} </h3>
    <table class="table table-striped">
        <tbody>
            @foreach($columnNames as $key => $value)
                @foreach($value as $columnName)
                    @if($key === 0) 
                        <tr>
                            <th class="col-sm-2">{{$columnName}}:</th>
                            <td class="col-sm-10">{{$user->$columnName}}</td>
                        </tr>
                    @else
                        <tr>
                            <th class="col-sm-2">{{$key . '.' . $columnName}}:</th>
                            <td class="col-sm-10">{{$user->$key->$columnName}}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection