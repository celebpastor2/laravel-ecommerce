<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailListener
{
    public $mail;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMail $event): void
    {
        //
        $this->mail = $event->mail;
        //here is perfect for sending the email

        $this->sendEmail();
    }

    private function sendEmail(){
        $to = $this->mail['to'];
        $subject = $this->mail['subject'];
        $message = $this->mail['message'];
        $cc     = $this->mail['cc'];
        @mail($to, $subject, $message, ['cc' => $cc]);
    }
}
