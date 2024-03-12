<?php

namespace App\Notifications;

use App\Models\Product;
use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewEmailNotification extends Notification
{
    use Queueable;


    protected $request;


    /**
     * Create a new notification instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message = new MailMessage ;
            $message
                    ->subject('Request Confirmation')
                    ->greeting("Hello {$notifiable->name},")
                    ->line('Your request '.$this->request->id.' for the product has been evaluated.')
                    ->action('Show Details', url('request/show', $this->request->id))
                    ->line('Thank you for using our application!');
        return $message;
    }

    public function toDatabase(object $notifiable)
    {
        return[
            'title' => 'Request Confirmation',
            'body' => 'Your request '.$this->request->id.' for the product has been evaluated',
            'image' => '',
            'url' => route('request.show', $this->request->id),
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
            //
        ];
    }
}
