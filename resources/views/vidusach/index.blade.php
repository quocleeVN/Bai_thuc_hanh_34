<x-book-layout>
    <x-slot name="title">
        Sách
    </x-slot>
    <style>
        .list-book {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .book img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
    <div class="list-book">
        @foreach($data as $row)
            <div class="book">
                <a href="{{ url('sach/chitiet/'.$row->id) }}">
                    <img src="{{ asset('hinh/image/'.$row->file_anh_bia) }}">
                    <b>{{ $row->tieu_de }}</b><br>
                    <i>{{ number_format($row->gia_ban,0,",",".") }} đ</i>
                </a>
            </div>
        @endforeach
    </div>
</x-book-layout>