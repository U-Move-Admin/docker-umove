<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message;
    public function __construct($message, $property)
    {
        $this->message = $message;
        $this->property = $property;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject($this->message['subject'])->markdown('mail.property_message', ['text' => $this->message->text,'name' => $this->message->name,'tel'=>$this->message->tel,'email'=> $this->message->email, 'property_id' => $this->property->id ]);
    }
}
