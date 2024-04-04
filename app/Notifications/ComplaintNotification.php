<?php

namespace App\Notifications;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ComplaintNotification extends Notification
{
    use Queueable;

    protected $complaint;
    /**
     * Create a new notification instance.
     */
    public function __construct(Complaint $complaint)
    {
        $this->complaint = $complaint;
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
    public function toDatabase(object $notifiable)
    {
        if ($this->complaint->admin_id) {
            return[
                'title' => 'Answer Complaint',
                'body' => 'Your complaint has been answered',
                'image' => '',
                'url' => route('complaints.show',$this->complaint->id),
            ];
        }else{
            return[
                'title' => 'New Complaint',
                'body' => 'New Complaint from ('.$this->complaint->user->name.') has been created',
                'image' => '',
                'url' => route('admin.complaints.show',$this->complaint->id),
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
