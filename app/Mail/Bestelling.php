<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\user\Cart;

class Bestelling extends Mailable
{
    use Queueable, SerializesModels;

    public $verhuren;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cart $verhuren)
    {
        $this->verhuren = $verhuren;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bestelling');
    }
}
