<?php

namespace App\Notifications;

use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductRequestNotification extends Notification
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
        // if ($this->request->datails->name) {
        //     $message
        //             ->subject('New Request')
        //             ->greeting("Hello {$notifiable->name},")
        //             ->line('New request for the product ('.$this->request->details->name.') has been created')
        //             ->action('Show Details', url('admin/request/show',$this->request->id))
        //             ->line('Thank you for using our application!');
        // }else{
            $message
            ->subject('New Request')
            ->greeting("Hello {$notifiable->name},")
            ->line('New request for private label has been created')
            ->action('Show Details', url('admin/request/show',$this->request->id))
            ->line('Thank you for using our application!');
        // }
        return $message;
    }

    public function toDatabase(object $notifiable)
    {
        // if ($this->request->datails->name) {
        //     return[
        //         'title' => 'New Request',
        //         'body' => 'New request for the product ('.$this->request->datails->name.') has been created',
        //         'image' => '',
        //         'url' => route('admin.request.show',$this->request->id),
        //     ];
        // }else{
            return[
                'title' => 'New Request',
                'body' => 'New request for private label has been created',
                'image' => '',
                'url' => route('admin.request.show',$this->request->id),
            ];
        // }
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
