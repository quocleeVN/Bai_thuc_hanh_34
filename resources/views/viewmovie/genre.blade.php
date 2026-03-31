<h2 style="text-align:center;">Chọn thể loại</h2>

<form method="POST" action="/genre_result">
    @csrf

    <select name="genre">
        @foreach($genres as $g)
            <option value="{{ $g->genre_name }}">
                {{ $g->genre_name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Xem phim</button>
</form>