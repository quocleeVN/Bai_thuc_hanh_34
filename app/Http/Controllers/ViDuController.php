<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TestSendEmail;
use App\Models\User;

class ViDuController extends Controller
{
   
    function hello() { return 'Xin Chào'; }

    function hubview() { return view('hello'); }

    function sum(Request $request) {
        $a = $request->input("so_a");
        $b = $request->input("so_b");
        return "Kết quả: " . ($a + $b);
    }

    function tacphamkd() {
        $tp = DB::table("sach")->where("the_loai", 1)->get();
        return view('tacphamkd', compact("tp"));
    }

    // --- YÊU CẦU 6A: GỬI THỬ (CHẠY QUA ROUTE /testemail) ---
    public function testemail()
    {
        // Giả lập lấy User ID = 2 và Đơn hàng ID = 7 để test
        $user = User::find(2); 
        if (!$user) return "Lỗi: Không tìm thấy User ID = 2";

        // Gọi hàm xử lý dùng chung (logic của 6b)
        return $this->guiEmailXacNhan(7, $user);
    }

 
    public function guiEmailXacNhan($maDonHang, $user = null)
    {
        // Nếu không truyền user, mặc định lấy người đang đăng nhập
        $targetUser = $user ?? Auth::user();

        if (!$targetUser) return "Lỗi: Người dùng chưa đăng nhập";

        // Lấy dữ liệu chi tiết đơn hàng
        $data = DB::select("select * from chi_tiet_don_hang c, sach s 
                           where c.sach_id = s.id and c.ma_don_hang = ?", [$maDonHang]);

        if (empty($data)) return "Lỗi: Đơn hàng số $maDonHang không có dữ liệu";

        // Gửi Notification
        $targetUser->notify(new TestSendEmail($data));

        return "Đã gửi email thành công cho: " . $targetUser->email;
    }
}