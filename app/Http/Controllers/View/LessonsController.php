<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    function lessons_list($course_id, $lesson_id = 0)
    {

        $lessons = \App\Lesson::with(['student_watch_lesson' => function ($q) {
            $q->where('lesson_student.user_id', auth()->id());
        }])->where('course_id', $course_id)->orderBy('id', 'asc')->get();
        if ($lesson_id == 0) {
            $lesson_watching = $lessons->first();
        } else {

            $lesson_watching = $lessons->where('id', $lesson_id)->first();
        }
        return view('lessons.lessons', compact('lessons', 'lesson_watching'));

    }

}
