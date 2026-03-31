@foreach($top as $row)
Tên phim: {{$row->movie_name}}, Ngày phát hành: {{$row->release_date}}, Điểm bình chọn trung bình: {{$row->vote_average}}
<br>
@endforeach