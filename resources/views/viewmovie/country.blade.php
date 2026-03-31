<h2>Chọn quốc gia</h2>

<form method="POST" action="/country_result">
    @csrf

    <select name="country">
        @foreach($countries as $c)
            <option value="{{ $c->country_name }}">
                {{ $c->country_name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Xem phim</button>
</form>