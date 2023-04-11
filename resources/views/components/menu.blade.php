<ul {{$attributes}}>
    <li {{$li->attributes}}><a href={{route('main')}} {{$aFirst->attributes}}>Home</a></li>
    <li {{$li->attributes}}><a href={{route('homework')}} {{$a->attributes}}>Homework</a></li>
    <li {{$li->attributes}}><a href={{route('user.all')}} {{$a->attributes}}">Users</a></li>
    <li {{$li->attributes}}><a href="#" {{$a->attributes}}>Blog</a></li>
</ul>
