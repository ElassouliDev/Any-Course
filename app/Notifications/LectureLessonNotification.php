<?php

namespace App\Notifications;

use App\Course;
use App\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LectureLessonNotification extends Notification
{
    use Queueable;
    public $lesson;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
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
        $course = Course::find($this->lesson->course_id);
        return [
            'url_en'=>'course/'.$course->slug_en.'/lesson/'.$this->lesson->slug_en.'/question',
            'url_ar'=>'course/'.$course->slug_ar.'/lesson/'.$this->lesson->slug_ar.'/question',
            'user_id'=>auth()->user()->id,
            'title_en'=>$this->lesson->title_en,
            'title_ar'=>$this->lesson->title_ar,
            'message_en' => 'A new lesson has been added'.$this->lesson->title_en.'To the course '.$course->title_en,
            'message_ar' => 'تمت اضافة درس جديد   '.$this->lesson->title_ar.'الى كورس '.$course->title_ar,
        ];
    }
}
