<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TestSendEmail extends Notification
{
    use Queueable;

    private $data; // Biến lưu dữ liệu đơn hàng

    /**
     * PHẢI CÓ 2 DẤU GẠCH DƯỚI: __construct
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Đặt hàng thành công")
            ->view("email_template.don_hang_thanh_cong", ["data" => $this->data]);
    }

    public function toArray($notifiable)
    {
        return [];
    }
}