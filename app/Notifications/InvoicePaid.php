<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;
private $message_id;
private $user_create;
private $created_at;
private $content;

    /**
     * Create a new notification instance.
     */
    public function __construct($message_id, $user_create, $created_at,$content)
    {
        $this->message_id=$message_id;
        $this->user_create=$user_create;
        $this->created_at=$created_at;
        $this->content=$content;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */

     
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDataBase(object $notifiable): array
    {
        return [
       'message_id'=>$this->message_id,
       'user_create'=>$this->user_create,
       'created_at'=>$this->created_at,
       'content'=>$this->content,

            
        ];
    }
}
