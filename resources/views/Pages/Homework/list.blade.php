@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Мое домашнє завдання</h1>
    <ul>
        <li><a href={{route('homework.lesson', ['id' => 7])}}> Лекція 7. Будівельник запитів</a></li>
        <li><a href={{route('homework.lesson', ['id' => 8])}}> Лекція 8-9. ELOQUENT - початок роботи</a></li>
        <li><a href={{route('homework.lesson', ['id' => 10])}}> Лекція 10. Eloquent - відносини</a></li>
    </ul>
@endsection