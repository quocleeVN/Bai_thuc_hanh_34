<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id();
            $table->timestamp('ngay_dat_hang');
            $table->tinyInteger('tinh_trang')->default(1); // 1: Chờ xử lý, 2: Đang xử lý, 3: Hoàn thành, 4: Hủy
            $table->tinyInteger('hinh_thuc_thanh_toan'); // 1: Tiền mặt, 2: Chuyển khoản, 3: VNPay
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
