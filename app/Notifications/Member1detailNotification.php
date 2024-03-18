<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Member1detailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $url;
    public $record;
    public $password;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $url,$record,$password)
    {
        $this->user = $user;
        $this->url = $url;
        $this->record = $record;
        $this->password = $password;


        
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
        $message =  "Admin assigned to Sub Admin Access Please Login";
        $record = $this->record;
       
        $url = $this->url;
        $mail = $this->user;
        $password = $this->password;
        return (new MailMessage)
            ->subject($subject)
            ->line($message)
            ->view("emails.member1detail-email", ["content" => $message,'url'=>$url,'email'=>$mail,'record'=> $record,'password'=> $password]);
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
