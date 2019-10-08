<?php

namespace App\Observers;

use App\Course;
use App\Events\NotificationPusher;
use App\Events\NotificationsPusher;
use App\Lesson;
use App\Notifications\LectureLessonNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class LessonObserver
{
    /**
     * Handle the lesson "created" event.
     *
     * @param  \App\Lesson  $lesson
     * @return void
     */
    public function created(Lesson $lesson)
    {
      $course = (Course::where('courses.user_id', auth()->id())->find(request('course_id')));


        $data = [
            'message_en' =>'A new lesson has been added '.$course['title_en'],
            'message_ar' => 'تم اضافة درس جديد '.$course['title_en'],
            'url_en'=>'course/'.$course['slug_en'].'/lesson/'.$lesson->slug_en,
            'url_ar'=>'course/'.$course->slug_ar.'/lesson/'.$lesson->slug_ar,
            'title_en' => $lesson->title_en,
            'title_ar' => $lesson->title_ar,
            'user_id'=>auth()->user()->id,
            'created_at'=>Carbon::parse($lesson->created_at),
        ];
        $notification = Notification::send($course->students, new LectureLessonNotification($data));
       foreach ($course->students as $student){

           event(new NotificationPusher($data,$student));
       }
    }

    /**
     * Handle the lesson "updated" event.
     *
     * @param  \App\Lesson  $lesson
     * @return void
     */
    public function updated(Lesson $lesson)
    {
        //
    }

    /**
     * Handle the lesson "deleted" event.
     *
     * @param  \App\Lesson  $lesson
     * @return void
     */
    public function deleted(Lesson $lesson)
    {
        //
    }

    /**
     * Handle the lesson "restored" event.
     *
     * @param  \App\Lesson  $lesson
     * @return void
     */
    public function restored(Lesson $lesson)
    {
        //
    }

    /**
     * Handle the lesson "force deleted" event.
     *
     * @param  \App\Lesson  $lesson
     * @return void
     */
    public function forceDeleted(Lesson $lesson)
    {
        //
    }
}
