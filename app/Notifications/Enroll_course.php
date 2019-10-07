<?php

namespace App\Notifications;

use App\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Enroll_course extends Notification
{
    use Queueable;
    public $course;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
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
        return [
            'url_en'=>'course/'.$this->course->slug_en,
            'url_ar'=>'course/'.$this->course->slug_ar,
            'user_id'=>auth()->user()->id,
            'title_en'=>$this->course->title_en,
            'title_ar'=>$this->course->title_ar,
            'message_en' => 'Course followed'.$this->course->title_en.'By '.auth()->user()->full_name(),
            'message_ar' => 'تمت متابعة الكورس  '.$this->course->title_ar.'من قبل '.auth()->user()->full_name(),


        ];
    }
}
