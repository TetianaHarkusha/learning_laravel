<ul {{$attributes}}>
    <li {{$li->attributes}}><a href={{route('main')}} {{$a->attributes->class($a)}}>{{ __('Main page') }}</a></li>
    <li {{$li->attributes}}><a href={{route('homework.list')}} {{$a->attributes}}">{{ __ ('Homeworks') }}</a></li>
    <li {{$li->attributes}}><a href={{route('user.all')}} {{$a->attributes}}">{{ __('Users') }}</a></li>
    <li {{$li->attributes}}><a href="#" {{$a->attributes}}>{{ __('Posts') }}</a></li>
    <li {{$li->attributes}}><a href={{route('dashboard.main')}} {{$a->attributes}}">{{ __('Dashboard') }}</a></li>
</ul>
