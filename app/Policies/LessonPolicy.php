<?php

namespace App\Policies;

use App\User;
use App\Lesson;
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any lessons.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the lesson.
     *
     * @param  \App\User  $user
     * @param  \App\Lesson  $lesson
     * @return mixed
     */
    public function view(User $user, Lesson $lesson)
    {
        return $user->hasPermission('read_lesson');

    }

    /**
     * Determine whether the user can create lessons.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create_lesson');

    }

    /**
     * Determine whether the user can update the lesson.
     *
     * @param  \App\User  $user
     * @param  \App\Lesson  $lesson
     * @return mixed
     */
    public function update(User $user, Lesson $lesson)
    {
        return $user->hasPermission('update_lesson');

    }

    /**
     * Determine whether the user can delete the lesson.
     *
     * @param  \App\User  $user
     * @param  \App\Lesson  $lesson
     * @return mixed
     */
    public function delete(User $user, Lesson $lesson)
    {
        return $user->hasPermission('delete_lesson');

    }

    /**
     * Determine whether the user can restore the lesson.
     *
     * @param  \App\User  $user
     * @param  \App\Lesson  $lesson
     * @return mixed
     */
    public function restore(User $user, Lesson $lesson)
    {
        return $user->hasRole('super_admin');

    }

    /**
     * Determine whether the user can permanently delete the lesson.
     *
     * @param  \App\User  $user
     * @param  \App\Lesson  $lesson
     * @return mixed
     */
    public function forceDelete(User $user, Lesson $lesson)
    {
        return $user->hasRole('super_admin');

    }
}
