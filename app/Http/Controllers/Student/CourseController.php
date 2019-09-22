<?php

namespace App\Http\Controllers\Student;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{





    function getEnrolledCoursesByUser()
    {
        $courses = Auth::user()->enrolled_course()->paginate(27);
        return view('student.course_enrolled',compact('courses'));

    }

    function enroll_and_in_enroll_course($slug)
    {
        $course_id = Course::where('slug_'.app()->getLocale(),$slug)->first()->id;
        Auth::user()->enrolled_course()->toggle($course_id);
        return back();

    }


    function student_watch_lesson(Request $request)
    {

        $lesson = Auth::user()->student_watch_lesson()->where('lesson_student.lesson_id', $request->lesson_id)->first();
        if (empty($lesson))
            Auth::user()->student_watch_lesson()->attach($request->lesson_id);


        return response(['status'=>true]);
    }

    function complete_watch_lesson(Request $request)
    {
        Auth::user()->student_watch_lesson()->syncWithoutDetaching([$request->lesson_id => ['is_completed' => true]]);

        return response(['status'=>true]);

    }
}
