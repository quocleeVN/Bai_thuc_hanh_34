@foreach($topb as $row)
Tên phim: {{$row->movie_name}}, Ngày phát hành: {{$row->release_date}}, Doanh thu: {{$row->budget}}
<br>
@endforeach