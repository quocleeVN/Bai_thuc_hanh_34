<h2 style="text-align:center;">Phim hot</h2>

<table border="1" cellpadding="8" cellspacing="0" style="margin:auto;">
<tr>
    <th>Tên phim</th>
    <th>Ngày phát hành</th>
    <th>Mô tả</th>
    <th>Ảnh</th>
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