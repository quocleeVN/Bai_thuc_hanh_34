<h2 style="text-align:center;">Top Vote</h2>

<table border="1" cellpadding="8" cellspacing="0" style="margin:auto;">
    <tr>
        <th>Tên phim</th>
        <th>Ngày phát hành</th>
        <th>Điểm vote</th>
    </tr>

    @foreach($movies as $m)
    <tr>
        <td>{{ $m->movie_name }}</td>
        <td>{{ $m->release_date }}</td>
        <td>{{ $m->vote_average }}</td>
    </tr>
    @endforeach
</table>