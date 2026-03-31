<h2 style="text-align:center;">Kết quả</h2>

<table border="1" cellpadding="8" cellspacing="0" style="margin:auto;">
    <tr>
        <th>Tên phim</th>
        <th>Ngày phát hành</th>
        <th>Thời lượng (phút)</th>
    </tr>

    @foreach($movies as $m)
    <tr>
        <td>{{ $m->movie_name }}</td>
        <td>{{ $m->release_date }}</td>
        <td>{{ $m->runtime }} phút</td>
    </tr>
    @endforeach
</table>