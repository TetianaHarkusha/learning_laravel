@extends('layouts.app')

@section('title')
    homework
@endsection

@section('content')
    <h1>Мое домашнє завдання</h1>
    <h3>Лекція 10. Eloquent - відносини</h3>
    <ol>
        <li>Зробіть такі таблиці:<br>
            <strong>users</strong>
            <ul><i>
                <li>id</li>
                <li>login</li>
                <li>password</li>
            </i></ul>
            <strong>profiles</strong>
            <ul><i>
                <li>id</li>
                <li>name</li>
                <li>surname</li>
                <li>email</li>
                <li>user_id</li>
            </i></ul>
        </li>
        <li>Зв'яжіть ці таблиці ставленням один до одного.</li>
        <li>
            <a href={{route('user.profile.one')}}>    
                Отримайте якогось користувача разом з його профілем. 
            </a>
        </li>
        <li>
            <a href={{route('user.profile.all')}}>      
                Отримайте всіх користувачів разом з їхніми профілями, передайте їх у виставу 
                та виведіть на екран у вигляді HTML таблиці.
            </a>
        </li>
        <li>Зв'яжіть таблиці з користувачами та профілями ставленням додовжин.</li>
        <li>
            <a href={{route('profile.user.all')}}>
                Отримайте всі профілі разом з їхніми користувачами. Виведіть їх у поданні у вигляді HTML таблиці.
            </a>
        </li>
        <li>Зробіть такі таблиці:<br>
            <strong>cities</strong>
            <ul><i>
                <li>id</li>
                <li>name</li>
                <li>population</li>
                <li>country_id</li>
            </i></ul>
            <strong>countries</strong>
            <ul><i>
                <li>id</li>
                <li>name</li>
            </i></ul>
        </li>
        <li>Зв'яжіть таблицю країн з таблицею cities ставленням добудь-якого.</li>
        <li>Отримайте всі країни разом з їхніми містами, населення яких понад 100 тисяч.</li>
        <li>Отримати всі країни разом з їхніми містами. Міста кожної країни відсортуйте за зростанням населення.</li>
        <li>Зв'яжіть таблицю підприємств з таблицею країн ставленням додовжин.</li>
        <li>Отримайте всі міста з населенням понад 100 тисяч разом із їхніми країнами.</li>
        <li>Зробіть такі таблиці:<br>
            <strong>cities</strong>
            <ul><i>
                <li>id</li>
                <li>name</li></i>
            </i></ul>
            <strong>position</strong>
            <ul><i>
                <li>id</li>
                <li>name</li></i>
            </i></ul>
            <strong>users</strong>
            <ul><i>
                <li>id</li>
                <li>name</li></i>
                <li>city_id</li></i>
                <li>position_id</li></i>
            </i></ul>
        </li>
        <li>Зробіть модель з користувачами, модель з містами та модель з посадами.</li>
        <li>Получите юзера вместе с его городом и должностью.</li>
        <li>Виберіть кілька запитів з попередніх завдань і переробіть їх код на завантаження.</li>
    </ol>
@endsection