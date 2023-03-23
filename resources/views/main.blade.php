<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StadyLaravel</title>
</head>
<body>
    <h1>Головна сторінка</h1>
    <h2>Main page</h2>
    <!--display the contents of a variable-->
    <h3>Hello, <?php echo $name. ' ' . $surname?></h3> <!--by standard php-->
    <h4>Hello, <?=$name. ' ' . $surname?></h4><!--by alternative php-->
    <h5>Hello, {{$name . ' ' . $surname}}</h5><!--by Blade-->
</body>
</html>