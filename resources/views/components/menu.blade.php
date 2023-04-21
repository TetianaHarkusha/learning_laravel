<ul {{$attributes}}>
    <li {{$li->attributes}}><a href={{route('main')}} {{$a->attributes->class($a)}}>Головна</a></li>
    <li {{$li->attributes}}><a href={{route('homework.list')}} {{$a->attributes}}">Домашнє завдання</a></li>
    <li {{$li->attributes}}><a href={{route('user.all')}} {{$a->attributes}}">Користувачі</a></li>
    <li {{$li->attributes}}><a href="#" {{$a->attributes}}>Публікації</a></li>
    <li {{$li->attributes}}><a href={{route('dashboard.main')}} {{$a->attributes}}">Адмін.панель</a></li>
</ul>
