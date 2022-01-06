<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreate extends Mailable
{
    use Queueable, SerializesModels;
    public $insert;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($insert)
    {
       $this->insert = $insert;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@mail.com')->view('mail.accountcreate');
    }
}
