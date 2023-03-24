<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>
<body>
    {!!$content!!}

    @isset($id)
        @if (is_numeric($id)) 
            <p>Ідентифікатор: {{$id}}</p>
        @else 
            @if($name == '')
                <p>Ім'я: {{$id}}</p>
            @else 
                <p>Прізвище: {{$id}}</p>
            @endif
        @endif

        @if(!$name == '')
            <p>Ім'я: {{$name}}</p>
        @endif
    @endisset

    @isset($age)
        <p>Вік: {{$age}}</p>
    @endisset

    @isset($salary)
        <p>Заробітна плата: {{$salary}}</p>
    @endisset
  
  
</body>
</html>