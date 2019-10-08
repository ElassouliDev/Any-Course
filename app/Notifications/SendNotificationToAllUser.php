<?php

namespace App\Notifications;

use App\Course;
use App\Lesson;
use App\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendNotificationToAllUser extends Notification
{
    use Queueable;
    public $notification;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification = $notification  ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
//        dd($this->notification);
        return [
            'url_en'=>'#',
            'url_ar'=>'#',
            'user_id'=>auth()->user()->id,
            'title_en'=>'#',
            'title_ar'=>'#',
            'message_en' => $this->notification['message_en'],
            'message_ar' => $this->notification['message_ar'],
        ];
    }
}
