<h2 style="text-align:center;"> Kết Quả </h2>

<table border="1" cellpadding="8" cellspacing="0" style="margin:auto;">
<tr>
    <th>Tên</th>
    <th>Ngày</th>
    <th>Mô tả</th>
    <th>Ảnh đại diện</th>
</tr>

@foreach($movies as $m)
<tr>
    <td>{{ $m->movie_name }}</td>
    <td>{{ $m->release_date }}</td>
    <td>{{ $m->overview }}</td>
    <td><img src="{{ $m->image_link }}" width="100"></td>
</tr>
@endforeach
</table>