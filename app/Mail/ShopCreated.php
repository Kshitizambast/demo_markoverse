<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $shop;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shop)
    {
        $this->shop  = $shop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.shop-created');
    }
}
