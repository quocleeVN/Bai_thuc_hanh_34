@foreach($toptime as $row)
Tên phim: {{$row->movie_name}}, Ngày phát hành: {{$row->release_date}}, Thời lượng: {{$row->runtime}}
<br>
@endforeach