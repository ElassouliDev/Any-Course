<?php

namespace App\Events;

use App\Course;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CoursePusher implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;



    public $course;

    public function __construct(Course $course)
    {

        $this->course = [
            'message_en' => auth()->user()->full_name().' added a new course ',
            'message_ar' => auth()->user()->full_name().'اضاف كورس جديد  ',
            'slug_en' => $course->slug_en,
            'slug_ar' => $course->slug_ar,
            'title_en' =>$course->title_en,
            'title_ar' =>$course->title_ar,
        ];
    }

    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}
