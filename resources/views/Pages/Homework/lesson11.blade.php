@extends('layouts.app')

@section('title')
    homework
@endsection

@section('content')
    <h1>Мое домашнє завдання</h1>
    <h3>Лекція 11. Життєвий цикл запитання</h3>
    <h4>HTTP-запити</h4>
    <ol>
        <li>Введіть об'єкт запиту в дію контролера.</li>
        <li>
            <a href={{route('test.form')}}>    
                Зробіть форму з трьома інпутами, в які вводитимуться числа. 
                Після надсилання форми знайдіть суму введених чисел і передайте її у виставу.
            </a>
        </li>
        <li>
            <a href={{route('user.create')}}>    
                Зробіть форму, яка запитуватиме ім'я, вік і зарплату користувача. Надішліть цю форму методом POST.
            </a>
        </li>
        <li>
            <a href={{route('dashboard.posts.index')}}>    
                Створіть в адмінпанелі кілька сторінок для створення/редагування будь-яких сутностей (наприклад: постів) 
                і надішліть дані форми у відповідний метод контролера. За допомогою команди dd() виведіть отримані дані.
            </a>
        </li>
    </ol>
    <h4>HTTP-відповіді</h4>
    <ol>
        <li>Віддайте як відповідь статус 201 та деякий текст.</li>
        <li>Віддайте як відповідь статус 404 і деякий текст.</li>
    </ol>
    <h4>HTTP-клієнт</h4>
    <ol>
        <li>За допомогою HTTP-клієнта отримайте дані з будь-якого стороннього сайту</li>
    </ol>
@endsection