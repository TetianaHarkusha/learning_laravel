@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h3>Тестова сторінка</h3>
    <h5>Обчислення суми чисел</h5>
    <div class="col-6">
        <form action="{{ route('test.form') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="num1" class="form-label">Число 1:</label>
                <input name="num1" type="text" class="form-control" id="num1" aria-describedby="num1Help" value="{{$num1 ?? ''}}">
                <div id="num1Help" class="form-text">Enter the first number.</div>
            </div>
            <div class="mb-3">
                <label for="num2" class="form-label">Число 2:</label>
                <input name="num2" type="text" class="form-control" id="num2" aria-describedby="num2Help" value="{{$num2 ?? ''}}">
                <div id="num2Help" class="form-text">Enter the second number.</div>
            </div>
            <div class="mb-3">
                <label for="num1" class="form-label">Число 3:</label>
                <input name="num3" type="text" class="form-control" id="num3" aria-describedby="num3Help" value="{{$num3 ?? ''}}">
                <div id="num3Help" class="form-text">Enter the third number.</div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-8 row"> 
                    <p id="result">Сума чисел: {{$result ?? ''}}</p>
                </div>
            </div>
        </form>
    </div>
@endsection
