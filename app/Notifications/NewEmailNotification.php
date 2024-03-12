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
    protected $product;


    /**
     * Create a new notification instance.
     */
    public function __construct(Request $request, Product $product = null)
    {
        $this->request = $request;
        $this->product = $product;
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
        if ($this->product) {
            $message
                    ->subject('Request Confirmation')
                    ->greeting("Hello {$notifiable->name},")
                    ->line('Your request number '.$this->request->id.' for the product ('.$this->product->name.') has been evaluated.')
                    ->line('An offer has been sent to you.Please check your account')
                    ->action('Show Details', url('request/show', $this->request->id))
                    ->line('Thank you for using our application!');
        }else{
            $message
                    ->subject('Request Confirmation')
                    ->greeting("Hello {$notifiable->name},")
                    ->line('Your request number '.$this->request->id.' for the product has been evaluated.')
                    ->line('An offer has been sent to you.Please check your account')
                    ->action('Show Details', url('request/show', $this->request->id))
                    ->line('Thank you for using our application!');
        }

        return $message;
    }

    public function toDatabase(object $notifiable)
    {
        if ($this->product) {
            return[
                'title' => 'Request Confirmation',
                'body' => 'Your request number '.$this->request->id.' for the product ('.$this->product->name.') has been evaluated.
                            An offer has been sent to you.Please check your account',
                'image' => '',
                'url' => route('request.show', $this->request->id),
            ];
        }else{
            return[
                'title' => 'Request Confirmation',
                'body' => 'Your request number '.$this->request->id.' for the product has been evaluated.
                            An offer has been sent to you.Please check your account',
                'image' => '',
                'url' => route('request.show', $this->request->id),
            ];
        }
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
