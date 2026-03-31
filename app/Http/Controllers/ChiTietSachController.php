<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChiTietSachController extends Controller
{
    public function show($id)
{
    
    $data = \DB::table('sach')->where('id', $id)->first();

    if (!$data) {
        abort(404);
    }

    return view('vidusach.chitiet', compact('data'));
}
}
