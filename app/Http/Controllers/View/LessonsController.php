<?php

namespace App\Http\Controllers\View;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    function lessons_list($slug, $lesson_slug = '')
    {

        $course = Course::where('slug_ar' , $slug)->orWhere('slug_en',$slug)->first();
        $course_id = $course->id;
        $lessons = \App\Lesson::with(['student_watch_lesson' => function ($q) {
            $q->select('*')->where('lesson_student.user_id', auth()->id());
        }])->where('course_id', $course_id)->orderBy('id', 'asc')->get();
        if ($lesson_slug =='') {
            $lesson_watching = $lessons->first();
        } else {
            $lesson_watching = Lesson::where('slug_ar' , $lesson_slug)->orWhere('slug_en',$lesson_slug)->first();
        }
        return view('lessons.lessons', compact('lessons', 'lesson_watching','course'));

    }

}
