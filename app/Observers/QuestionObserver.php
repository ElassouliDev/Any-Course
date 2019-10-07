<?php

namespace App\Observers;

use App\Course;
use App\Lesson;
use App\Notifications\QuestionLectureNotification;
use App\Question;
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
        $user ->notify(new QuestionLectureNotification($lesson));

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
