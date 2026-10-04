<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendMailDoiMatKhau extends Mailable
{
    use Queueable, SerializesModels;

    public $view;
    public $data;
    public function __construct($view, $data)
    {
        $this->view = $view;
        $this->data = $data;
    }
    public function build()
    {
        return $this->view($this->view)
            ->subject('Mã OTP')
            ->with($this->data);
    }
}
