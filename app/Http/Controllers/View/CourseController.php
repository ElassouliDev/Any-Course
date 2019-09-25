<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends BaseController
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
        $course_id = \App\Course::where('slug_ar' , $slug)->orWhere('slug_en',$slug)->first()->id;
        $course = \App\Course::with(['students' => function ($q) use($course_id) {
            $q->where('course_student.user_id', Auth::id());
        }])->find($course_id);
        $course['is_enroll'] = (count($course->students) > 0) ? true : false;
//        dd([$course->student_course,$course->is_enroll]);

        unset($course->students);
        return view('courses.course_details', compact('course'));
    }

}
