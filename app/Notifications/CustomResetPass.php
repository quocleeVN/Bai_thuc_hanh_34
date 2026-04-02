<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPass extends Notification
{
    use Queueable;

    private $token;

    // Sửa lỗi: Đảm bảo có đúng 2 dấu gạch dưới và nhận tham số $token [cite: 204, 205]
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // Sửa lỗi cú pháp tạo URL [cite: 212]
        $url = route("password.reset", array("token" => $this->token));

        return (new MailMessage)
            ->subject('Lấy lại mật khẩu')
            ->view('email_template.reset_pass', compact("url")); // [cite: 215, 216]
    }
}