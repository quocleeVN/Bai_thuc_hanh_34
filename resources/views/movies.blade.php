
@if($type == 'genres')
    @foreach($data as $g)
        <p>{{ $g->genre_name }} - {{ $g->genre_name_vn }}</p>
    @endforeach
@endif



@if($type == 'topRated')
    @foreach($data as $m)
        <p>{{ $m->movie_name }} - {{ $m->release_date }} - {{ $m->vote_average }}</p>
    @endforeach
@endif



@if($type == 'topBudget')
    @foreach($data as $m)
        <p>{{ $m->movie_name }} - {{ $m->release_date }} - {{ $m->budget }}</p>
    @endforeach
@endif



@if($type == 'longMovies')
    @foreach($data as $m)
        <p>{{ $m->movie_name }} - {{ $m->release_date }} - {{ $m->runtime }}</p>
    @endforeach
@endif



@if($type == 'canadaMovies')
    @foreach($data as $m)
        <p>{{ $m->movie_name }} - {{ $m->release_date }} - {{ $m->runtime }}</p>
    @endforeach
@endif


@if($type == 'actionMovies')
<table border="1">
    <tr>
        <th>Tên</th>
        <th>Ngày phát hành</th>
        <th>Mô tả</th>
        <th>Hình ảnh</th>
    </tr>

    @foreach($data as $m)
    <tr>
        <td>{{ $m->movie_name }}</td>
        <td>{{ $m->release_date }}</td>
        <td>{{ $m->overview }}</td>
        <td><img src="{{ $m->image_link }}" width="100"></td>
    </tr>
    @endforeach
</table>
@endif



@if($type == 'popularMovies')
<table border="1">
    <tr>
        <th>Tên</th>
        <th>Ngày phát hành</th>
        <th>Mô tả</th>
        <th>Hình ảnh</th>
    </tr>

    @foreach($data as $m)
    <tr>
        <td>{{ $m->movie_name }}</td>
        <td>{{ $m->release_date }}</td>
        <td>{{ $m->overview }}</td>
        <td><img src="{{ $m->image_link }}" width="100"></td>
    </tr>
    @endforeach
</table>
@endif