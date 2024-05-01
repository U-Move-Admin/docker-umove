<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message;
    protected $senderEmail;
    protected $senderName;
    public function __construct($message)
    {
        $this->message = $message;
        $this->senderEmail = $message['email'];
        $this->senderName = $message['name'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->senderEmail);exit();
        return $this //->from($this->senderEmail, $this->senderName)
            ->subject('A Message From Website Customer')
            ->markdown('mail.contact',['message' => $this->message]);
    }
}
