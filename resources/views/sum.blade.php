<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{url('sum')}}" method="$_POST">
        <input type="text" name="so_a" placeholder="Hay nhap so a"> <br>
        <input type="text" name="so_b" placeholder="Hay nhap so b"> <br>
        <input type="submit" value="Kết quả"> <br>

        {{ csrf_field() }}

    </form>
</body>

</html>