<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApprovedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $url)
    {
        $this->user = $user;
        $this->url = $url;
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
        $message = "You can login from bellow link";
        $url = $this->url;
        $mail = $this->user;

        return (new MailMessage)
            ->subject($subject)
            ->line($message)
            ->view("emails.aprove-email", ["content" => $message,'url'=>$url,'email'=>$mail]);
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
