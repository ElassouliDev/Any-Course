<?php

namespace App\Observers;

use App\Course;
use App\Events\CoursePusher;
use App\Notifications\CourseSuperAdminNotification;
use App\User;
use Illuminate\Support\Facades\Notification;

class CourseObserver
{
    /**
     * Handle the course "created" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function created(Course $course)
    {

        $users = User::query();
        $super_admin = $users->whereRoleIs('super_admin')->get();
        if(count($users->where('id',$course->user_id)->get() ) == 0)
        Notification::send($super_admin, new CourseSuperAdminNotification($course));
        event(new CoursePusher($course));

    }

    /**
     * Handle the course "updated" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function updated(Course $course)
    {
        //
    }

    /**
     * Handle the course "deleted" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function deleted(Course $course)
    {
        //
    }

    /**
     * Handle the course "restored" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function restored(Course $course)
    {
        //
    }

    /**
     * Handle the course "force deleted" event.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function forceDeleted(Course $course)
    {
        //
    }
}
