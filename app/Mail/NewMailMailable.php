<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMailMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('new-email')
                    ->subject('Apply for Procurement')
                    ->replyTo('noreply@tnpubliclibraries.in', 'directorate tnpublic libraries');

    }
}
