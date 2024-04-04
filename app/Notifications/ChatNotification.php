<?php

namespace App\Notifications;

use App\Models\ChatMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChatNotification extends Notification
{
    use Queueable;
    protected $message;
    /**
     * Create a new notification instance.
     */
    public function __construct(ChatMessage $message)
    {
        $this->$message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable)
    {
            return [
                'title' => 'New Message',
                'body' => ($this->message->body),
                'url' => route('admin.request.show',$this->message->request->id),
            ];

    }

    public function toBroadcast(object $notifiable)
    {
        return [
            'title' => 'New Message',
            'body' => ($this->message->body),
            'url' => route('admin.request.show',$this->message->request->id),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [

        ];
    }
}
