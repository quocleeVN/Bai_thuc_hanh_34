<h2 style="text-align:center;">Top 10 phim doanh thu cao</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Tên phim</th>
        <th>Ngày phát hành</th>
        <th>Doanh thu</th>
    </tr>

    @foreach($movies as $m)
    <tr>
        <td>{{ $m->movie_name }}</td>
        <td>{{ $m->release_date }}</td>
        <td>{{ number_format($m->budget) }}</td>
    </tr>
    @endforeach
</table>