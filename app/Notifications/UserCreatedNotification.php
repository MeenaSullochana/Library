<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $password;
    public $randomCode;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $password,$randomCode)
    {
        $this->user = $user;
        $this->password = $password;
        $this->randomCode = $randomCode;

        
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
        $type = "new_user";
        if($this->user->usertype ){
            $subject = "Welcome ".$this->user->firstName;
            $message = "Your verfication code ";
        }else{
            $subject = "Welcome ".$this->user->name;
            $message = "You are verfication code ";
           
        }
       
        $randomCode = $this->randomCode;
  
        return (new MailMessage)
            ->subject($subject)
            ->line($message)
            ->view("emails.email-template", ["content" => $message,"randomCode"=>$randomCode]);
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
