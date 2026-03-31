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
            text-align: center;
            padding: 0 10px;
        }
    </style>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Nhà xuất bản</th>
            <th>Tác giả </th>
            <th>Giá bán</th>
            <th style="width: 200px ">Hình ảnh sách</th>
        </tr>
        @foreach($tp as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->tieu_de}}</td>
            <td>{{$row->nha_xuat_ban}}</td>
            <td>{{$row->tac_gia}}</td>
            <td>{{$row->gia_ban}}</td>
            <td><img src="{{$row->link_anh_bia}}" alt="" style="width: 100% "></td>
        </tr>

        @endforeach
    </table>

</body>

</html>