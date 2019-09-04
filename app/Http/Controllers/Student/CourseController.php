<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    function enroll_and_in_enroll_course($course_id)
    {
        Auth::user()->student_course()->toggle($course_id);
        return back();

    }


    function student_watch_lesson($lesson_id)
    {
        Auth::user()->student_watch_lesson()->attach($lesson_id);

    }

    function complete_watch_lesson($course_id)
    {
        Auth::user()->student_watch_lesson()->toggle($course_id);

    }
}
