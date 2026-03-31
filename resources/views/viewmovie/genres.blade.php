<h2 style="text-align:center;">Danh sách thể loại</h2>

<ul>
    @foreach($genres as $g)
        <li>
            {{ $g->genre_name }} - {{ $g->genre_name_vn }}
        </li>
    @endforeach
</ul>