<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    function course_list()
    {
        $courses = \App\Course::latest()->paginate(48);
        return view('courses.all_courses', compact('courses'));
    }


    function course_details($course_id)
    {
        $course = \App\Course::find($course_id);
        return view('courses.course_details', compact('course'));
    }

}
