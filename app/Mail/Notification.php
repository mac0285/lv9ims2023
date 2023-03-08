<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification extends Mailable
{
use Queueable, SerializesModels;
  
public $subject;
public $msg;
public $username;
public $name; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$msg,$username,$name)
    {
        $this->subject = $subject;
        $this->msg = $msg;
        $this->username = $username;
        $this->name = $name;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('livewire.mail.notification');
    }
}