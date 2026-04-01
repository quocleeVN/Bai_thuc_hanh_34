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

        .book {
            position: relative;
            margin: 10px;
            text-align: center;
            padding-bottom: 35px;
        }

        .btn-add-product {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
    <div class="list-book">
        @foreach($data as $row)

        <div class="book">
            <a href="{{ url('sach/chitiet/'.$row->id) }}">
                <img src="{{ asset('hinh/book_image/'.$row->file_anh_bia) }}">
                <b>{{ $row->tieu_de }}</b><br>
                <i>{{ number_format($row->gia_ban,0,",",".") }} đ</i>
            </a>
            <div class='btn-add-product'>
                <button class='btn btn-success btn-sm mb-1 add-product' book_id="{{$row->id}}">
                    Thêm vào giỏ hàng
                </button>
            </div>
        </div>

        @endforeach
    </div>
</x-book-layout>

<script>
    $(document).ready(function() {

        $(document).on("click", ".add-product", function() {

            let id = $(this).attr("book_id");
            let num = 1;

            $.ajax({
                type: "POST",
                url: "{{route('cartadd')}}",
                data: {
                    "_token": "{{csrf_token()}}",
                    "id": id,
                    "num": num
                },
                success: function(data) {
                    $("#cart-number-product").html(data);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });

        });

    });
</script>