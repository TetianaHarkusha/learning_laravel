@extends('layouts.app')

@section('title')
    homework
@endsection

@section('content')
    <p>Інформація з сесії.<br>
        Виконавець: {{$name}}<br>
        Остання зобота: {{$lastWork}}
    </p>
    <h1>Мое домашнє завдання</h1>
    <h3>Лекція 14. Сесія HTTP</h3>
    @if (session('success'))
        <d class="alert alert-success d-flex bd-highlight" role="alert">
            <svg class="bd-highlight bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="flex-grow-1 bd-highlight"><h5>{{ session('success') }}</h5></div>
            <button type="button" class="bd-highlight btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>   
    @endif
    <ol>
        <a href="#"><li>В одному дії контролера встановіть якесь значення в сесію, а в другому - отримайте його.</li></a>
        <a href="{{ route('dashboard.main') }}">
            <li>Використовуючи сесії, виведіть у якомусь поданні лічильник, який показує кількість оновлень сторінки.</li>
        </a>
        <a href="{{ route('dashboard.main') }}">
            <li>Запишіть у сесію час першого заходу користувача на сторінку. 
                При оновленні сторінки (і при першому заході також) виводьте цей час на екран.
            </li>
        </a>
        <a href="{{ route('session.destroy') }}">
            <li>Видаліть якусь змінну із сесії.</li>
        </a>
        <a href="{{ route('session.destroyAll') }}">
            <li>Очистіть сесію від заданих змінних.</li>
        </a>
        <a href="{{ route('session.array') }}">
            <li>Встановіть кілька змінних сесій. Отримайте ці встановлені змінні як масиву.</li>
        </a>
        <a href="{{ route('dashboard.main') }}">
            <li>Перевірте, чи існує в сесії змінний час. Якщо існує – виведіть на екран її значення, 
                а якщо не існує – встановіть її значення зараз.
            </li>
        </a>
        <a href="#"><li>За допомогою функції session збережіть якісь дані у сесію.</li></a>
        <a href="#"><li>За допомогою функції session отримайте збережені дані із сесії.</li></a>
    </ol>
@endsection