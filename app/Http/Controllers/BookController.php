<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function book()
    {
        $data = DB::table('sach')->get();
        return view('vidusach.index', compact('data'));
    }
    public function theloai($id)
    {
        $data = DB::table('sach')
                ->where('the_loai', $id)
                ->get();
        return view('vidusach.index', compact('data'));
    }
}
