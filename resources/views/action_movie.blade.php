<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            width: 250px;
        }

        .container {
            display: flex;
            justify-content: center;

        }

        img {
            width: 100%;
        }
    </style>
    <div class="container">
        <table>
            <tr>
                <th>Tên phim</th>
                <th>Ngày phát hành</th>
                <th>Mô tả</th>
                <th>Ảnh phim</th>
            </tr>

            @foreach($movie_act as $row)
            <tr>
                <td>{{$row->movie_name}}</td>
                <td>{{$row->release_date}}</td>
                <td>{{$row->overview}}</td>
                <td><img src="{{$row->image_link}}" alt=""></td>
            </tr>
            @endforeach

        </table>
    </div>
</body>

</html>