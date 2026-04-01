<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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


    public function booklist()
    {
        $data = DB::table('sach')->get();
        return view('vidusach.book_list', compact('data'));
    }

    public function bookcreate()
    {
        $the_loai = DB::table("dm_the_loai")->get();
        $action = "add";
        return view("vidusach.book_form", compact("the_loai", "action"));
    }

    public function booksave($action, Request $request)
    {
        $request->validate([
            'tieu_de' => ['required', 'string', 'max:200'],
            'nha_cung_cap' => ['required', 'string', 'max:50'],
            'nha_xuat_ban' => ['required', 'string', 'max:50'],
            'tac_gia' => ['required', 'string', 'max:50'],
            'hinh_thuc_bia' => ['required', 'string', 'max:50'],
            'gia_ban' => ['required', 'numeric'],
            'the_loai' => ['required', 'max:3'],
            'file_anh_bia' => ['nullable', 'image']
        ]);
        $data = $request->except("_token");

        if ($action == "edit")
            $data = $request->except("_token", "id");

        if ($request->hasFile("file_anh_bia")) {
            $fileName = $request->input("tieu_de") . "_" . rand(1000000, 9999999) . '.' . $request->file('file_anh_bia')->extension();
            $request->file('file_anh_bia')->storeAs('public/book_image', $fileName);
            $data['file_anh_bia'] = $fileName;
        }

        $message = "";
        if ($action == "add") {
            DB::table("sach")->insert($data);
            $message = "Thêm thành công";
        } else if ($action == "edit") {
            $id = $request->id;
            DB::table("sach")->where("id", $id)->update($data);
            $message = "Cập nhật thành công";
        }
        return redirect()->route('booklist')->with('status', $message);
    }

    public function bookedit($id)
    {
        $action = "edit";
        $the_loai = DB::table("dm_the_loai")->get();
        $sach = DB::table("sach")->where("id", $id)->first();
        return view("vidusach.book_form", compact("the_loai", "action", "sach"));
    }

    public function bookdelete(Request $request)
    {
        $id = $request->id;
        DB::table("sach")->where("id", $id)->delete();
        return redirect()->route('booklist')->with('status', "Xóa thành công");
    }

    public function cartadd(Request $request)
    {
        $request->validate([
            "id" => "required|numeric",
            "num" => "required|numeric"
        ]);

        $cart = session()->get("cart", []);

        if (isset($cart[$request->id])) {
            $cart[$request->id] += $request->num;
        } else {
            $cart[$request->id] = $request->num;
        }

        session()->put("cart", $cart);
        return count($cart);
    }
    public function order()
    {
        $cart = [];
        $data = [];
        $quantity = [];
        if (session()->has('cart') && count(session('cart')) > 0) {
            $cart = session("cart");
            $list_book = "";
            foreach ($cart as $id => $value) {
                $quantity[$id] = $value;
                $list_book .= $id . ", ";
            }

            $list_book = substr($list_book, 0, strlen($list_book) - 2);
            $data = DB::table("sach")
                ->whereRaw("id in (" . $list_book . ")")
                ->get();
        }

        return view("vidusach.order", compact("quantity", "data"));
    }
    public function cartdelete(Request $request)
    {
        $request->validate([
            "id" => ["required", "numeric"]
        ]);
        $id = $request->id;
        $total = 0;
        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get("cart");
            unset($cart[$id]);
        }

        session()->put("cart", $cart);
        return redirect()->route('order');
    }
    public function ordercreate(Request $request)
    {
        $request->validate([
            "hinh_thuc_thanh_toan" => ["required", "numeric"]
        ]);

        try {
            if (session()->has('cart') && count(session('cart')) > 0) {
                $order = [
                    "ngay_dat_hang" => DB::raw("now()"),
                    "tinh_trang" => 1,
                    "hinh_thuc_thanh_toan" => $request->hinh_thuc_thanh_toan,
                    "user_id" => Auth::user()->id
                ];

                DB::transaction(function () use ($order) {
                    $id_don_hang = DB::table("don_hang")->insertGetId($order);
                    $cart = session("cart");

                    $detail = [];

                    foreach ($cart as $id => $value) {
                        $book = DB::table("sach")->where("id", $id)->first();

                        $detail[] = [
                            "ma_don_hang" => $id_don_hang,
                            "sach_id" => $id,
                            "so_luong" => $value,
                            "don_gia" => $book->gia_ban
                        ];
                    }

                    DB::table("chi_tiet_don_hang")->insert($detail);

                    session()->forget('cart');
                });

                // ✅ THÀNH CÔNG
                return redirect()->route('order')->with('success', 'Đặt hàng thành công');
            } else {
                return redirect()->route('order')->with('error', 'Giỏ hàng trống');
            }
        } catch (\Exception $e) {
            return redirect()->route('order')->with('error', 'Lỗi đặt hàng. Xin quý khách vui lòng đặt lại!');
        }
    }
}
