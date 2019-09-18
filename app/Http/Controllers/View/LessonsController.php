<?php

namespace App\Http\Controllers\View;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    function lessons_list($slug, $lesson_id = 0)
    {
        $lesson_id = Lesson::where('slug_'.app()->getLocale(),$lesson_id)->first()->id;
        $course_id = Course::where('slug_'.app()->getLocale(),$slug)->first()->id;
        $lessons = \App\Lesson::with(['student_watch_lesson' => function ($q) {
            $q->select('*')->where('lesson_student.user_id', auth()->id());
        }])->where('course_id', $course_id)->orderBy('id', 'asc')->get();
        if ($lesson_id == 0) {
            $lesson_watching = $lessons->first();
        } else {

            $lesson_watching = $lessons->where('id', $lesson_id)->first();
        }
        return view('lessons.lessons', compact('lessons', 'lesson_watching'));

    }

}
