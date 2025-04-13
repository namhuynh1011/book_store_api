<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $order->total = $order->details->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
    
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('Xác nhận đơn hàng')
                    ->markdown('emails.order.confirmation');
    }
}
