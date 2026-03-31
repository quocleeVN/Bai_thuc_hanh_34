<x-book-layout>
    <x-slot name='title'>
        Sách
    </x-slot>
    <style>
        .book_info {
            display: flex;
            flex-direction: row;
        }

        .tieu_de {
            font-size: 20px;
            font-weight: 450;
        }
    </style>
    <div class="tieu_de">{{$data->tieu_de}}</div>
    <div class='book_info'>
        <div class="info-2"><img src="{{asset('images/'.$data->file_anh_bia)}}" width='200px'
                height='200px'><br></div>
        <div class="info-1">
            <span><b>Nhà cung cấp:</b> {{$data->nha_cung_cap}}</span><br>
            <span><b>Nhà xuất bản:</b> {{$data->nha_xuat_ban}}</span><br>
            <span><b>Tác giả:</b> {{$data->tac_gia}}</span><br>
            <span><b>Hình thức bìa:</b> {{$data->hinh_thuc_bia}}</span><br>
        </div>
    </div>
    <div>
        <span><b>Mô tả</b></span><br>
        <p>{{$data->mo_ta}}</p>
    </div>
</x-book-layout>