<ul {{$attributes}}>
    <li {{$li->attributes}}><a href={{route('main')}} {{$a->attributes->class($a)}}>Home</a></li>
    <li {{$li->attributes}}><a href={{route('homework.list')}} {{$a->attributes}}">Homework</a></li>
    <li {{$li->attributes}}><a href={{route('user.all')}} {{$a->attributes}}">Users</a></li>
    <li {{$li->attributes}}><a href="#" {{$a->attributes}}>Blog</a></li>
</ul>
