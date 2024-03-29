@extends('layouts.app')

@section('title')
    homework
@endsection

@section('content')
    <h1>Мое домашнє завдання</h1>
    <h3>Лекція 8-9. Eloquent</h3>
    <ol>
        <li> За допомогою artisan згенеруйте модель для таблиці cities.</li>
        <li> Для таблиці users вже є модель за промовчанням. 
            Нам вона поки що не потрібна. Перемістіть цей файл до іншого місця, щоб він нам не заважав. 
            За допомогою artisan згенеруйте модель для таблиці users.</li>
        <li>  Підключіть модель Users до контролера.</li>
        <li>
            <a href={{route('user.query.Eloquent', ['id' => 1])}}>
            Отримайте через модель всіх користувачів та передайте користувачів у виставу і виведіть їх у вигляді HTML таблиці.
            </a>
        </li>
        <li>Повторіть усі маніпуляції з даними з попереднього ДЗ.
            <ul>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 2])}}>
                        При отриманні даних з таблиці з користувачами залиште у вибірці лише поля name та email.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 3])}}>
                        При отриманні даних із таблиці з користувачами перейменуйте поле email на user_email.
                    </a>
                </li>
                <li>Отримайте всіх користувачів із віком (
                    <a href={{route('user.query.Eloquent', ['id' => 4])}}>рівним,</a>
                    <a href={{route('user.query.Eloquent', ['id' => 5])}}> не рівним,</a>
                    <a href={{route('user.query.Eloquent', ['id' => 6])}}> більшим,</a>
                    <a href={{route('user.query.Eloquent', ['id' => 7])}}> меншим,</a>
                    <a href={{route('user.query.Eloquent', ['id' => 8])}}>меншим або рівним</a>
                    ) 30 років
                </li>
            
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 9])}}>
                        Отримайте всіх користувачів з віком від 20 до 30 років.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 10])}}>
                        Отримайте всіх користувачів з віком 30, або зарплатою 500, або id, більшим за 4.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 11])}}>
                        Отримайте користувачів, які мають вік від 20 до 30, чи зарплата від 400 до 800.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 12])}}>
                        Отримайте користувачів, вік яких перебуває НЕ проміжку від 30 до 40 та відсортуйте їх за зменшенням зарплати.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 13])}}>
                        Отримайте колекцію імен всіх користувачів.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 14])}}>
                        Отримайте всіх користувачів, відсортованих у випадковому порядку.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 15])}}>
                        Отримайте одного випадкового користувача.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 16])}}>
                        Отримайте перших 3 користувача з віком, рівним 30.
                    </a>
                </li>
                <li>
                    <a href={{route('user.query.Eloquent', ['id' => 17])}}>
                        Отримайте 10 користувачів із віком 30, починаючи з третього.
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href={{route('user.create')}}>
                Додайте нового користувача у вашу базу даних
            </a>
        </li>
        <li>
            <a href={{route('user.edit')}}>
                Змініть будь-якого користувача у вашій базі даних.
            </a>
        </li>
        <li>
            <a href={{route('user.delete', ['id' => 1])}}>
                Видаліть із таблиці з користувачами всіх користувачів із віком понад 30 років.
            </a>
        </li>    
        <li>
            <a href={{route('user.delete', ['id' => 2])}}>
                Видаліть користувачів із id, рівними 4, 5, 6.
            </a>
        </li>
        <li>
            <a href={{route('user.delete', ['id' => 3])}}>    
                Реализуйте мягкое удаление юзеров.
            </a>
        </li>
        <li>
            <a href={{route('user.restore')}}>     
                Реалізуйте відновлення віддалених користувачів.
            </a>
        </li>
    </ol>
@endsection

