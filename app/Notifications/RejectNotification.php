<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $url;
    public $rejmessage;
    public $adminmail;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $url,$rejmessage,$adminmail)
    {
        $this->user = $user;
        $this->url = $url;
        $this->rejmessage = $rejmessage;
        $this->adminmail = $adminmail;

        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $type = "approved status";
        $subject = "Approved Status ";
        $message =  "You Registration Is Rejected";
        $adminmail= $this->adminmail;
        $rejmessage = $this->rejmessage;
        $url = $this->url;
        $mail = $this->user;

        return (new MailMessage)
            ->subject($subject)
            ->line($message)
            ->view("emails.reject-email", ["content" => $rejmessage,'url'=>$url,'email'=>$mail,'adminmail'=> $adminmail]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
