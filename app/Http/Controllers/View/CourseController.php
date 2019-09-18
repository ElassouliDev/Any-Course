<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    function course_list()
    {
        $courses = \App\Course::latest()->get();
        $courses_latest = $courses->take(6);
        $courses_all = $courses->take(12);
        return view('courses.all_courses', compact('courses', 'courses_all', 'courses_latest'));
    }


    function course_details($slug)
    {
        $course_id = \App\Course::where('slug_'.app()->getLocale(),$slug)->first()->id;
        $course = \App\Course::with(['student_course' => function ($q) use($course_id) {
            $q->where('course_student.user_id', Auth::id());
        }])->find($course_id);
        $course['is_enroll'] = (count($course->student_course) > 0) ? true : false;
//        dd([$course->student_course,$course->is_enroll]);

        unset($course->student_course);
        return view('courses.course_details', compact('course'));
    }

}
