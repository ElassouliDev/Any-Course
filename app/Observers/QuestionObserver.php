<?php

namespace App\Observers;

use App\Course;
use App\Events\NotificationPusher;
use App\Lesson;
use App\Notifications\QuestionLectureNotification;
use App\Question;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class QuestionObserver
{
    /**
     * Handle the question "created" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function created(Question $question)
    {
        $course = Course::where('slug_en',request('course_slug'))->orWhere('slug_ar',request('course_slug'))->first();
        $lesson = Lesson::where('slug_en',request('lesson_slug'))->orWhere('slug_ar',request('lesson_slug'))->first();
        $user = User::find($course->user_id);
        $data = [
            'url_en'=>'course/'.$course->slug_en.'/lesson/'.$lesson->slug_en.'/question',
            'url_ar'=>'course/'.$course->slug_ar.'/lesson/'.$lesson->slug_ar.'/question',
            'user_id'=>auth()->user()->id,
            'title_en'=>$lesson->title_en,
            'title_ar'=>$lesson->title_ar,
            'message_en' => 'Question has been added to Lesson'.$lesson->title_en.'By '.auth()->user()->full_name(),
            'message_ar' => 'تمت اضافة سؤال الى الدرس  '.$lesson->title_ar.'من قبل '.auth()->user()->full_name(),
            'created_at'=>Carbon::parse($question->created_at),
        ];
        $user ->notify(new QuestionLectureNotification($data));
        event(new NotificationPusher($data,$user));
    }

    /**
     * Handle the question "updated" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function updated(Question $question)
    {
        //
    }

    /**
     * Handle the question "deleted" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function deleted(Question $question)
    {
        //
    }

    /**
     * Handle the question "restored" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function restored(Question $question)
    {
        //
    }

    /**
     * Handle the question "force deleted" event.
     *
     * @param  \App\Question  $question
     * @return void
     */
    public function forceDeleted(Question $question)
    {
        //
    }
}
