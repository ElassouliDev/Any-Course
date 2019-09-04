<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    function course_list()
    {
        $courses = \App\Course::latest()->paginate(48);
        return view('courses.all_courses', compact('courses'));
    }


    function course_details($course_id)
    {
        $course = \App\Course::with(['student_course'=>function($q){
            $q->where('course_student.user_id',Auth::id());
    }])->find($course_id);

        $course['is_enroll'] =count($course->student_course)==1? true : false;
        unset($course->student_course);
        return view('courses.course_details', compact('course'));
    }

}
