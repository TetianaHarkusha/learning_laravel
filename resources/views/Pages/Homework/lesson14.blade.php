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
    <ol>
        <a href="#">
            <li>В одному дії контролера встановіть якесь значення в сесію, а в другому - отримайте його.</li>
        </a>

        <li>Використовуючи сесії, виведіть у якомусь поданні лічильник, який показує кількість оновлень сторінки.</li>
        <li>Запишіть у сесію час першого заходу користувача на сторінку. 
            При оновленні сторінки (і при першому заході також) виводьте цей час на екран.
        </li>
        <li>Видаліть якусь змінну із сесії.</li>
        <li>Очистіть сесію від заданих змінних.</li>
        <li>Встановіть кілька змінних сесій. Отримайте ці встановлені змінні як масиву.</li>
        <li>Перевірте, чи існує в сесії змінний час. Якщо існує – виведіть на екран її значення, 
            а якщо не існує – встановіть її значення зараз.
        </li>
        <li>За допомогою функції session збережіть якісь дані у сесію.</li>
        <li>За допомогою функції session отримайте збережені дані із сесії.</li>
    </ol>
@endsection