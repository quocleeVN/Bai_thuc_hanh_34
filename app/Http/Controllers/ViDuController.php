<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ViDuController extends Controller
{
    //
    function hello()
    {
        return 'Xin Chào';
    }

    function hubview()
    {
        return view('hello');
    }

    //Cho trang tính tổng
    function sum(Request $request)
    {

        $a = $request->input("so_a");
        $b = $request->input("so_b");
        $ketqua = $a + $b;
        return "Kết quả: " . $ketqua;
    }

    // BOOKDB

    function tacphamkd()
    {
        $tp = DB::table("sach")->where("the_loai", 1)->get();
        return view('tacphamkd', compact("tp"));
    }
}
