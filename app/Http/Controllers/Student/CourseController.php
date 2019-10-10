<?php

namespace App\Http\Controllers\Student;

use App\Answer_user;
use App\Certificate;
use App\Course;
use App\Http\Controllers\BaseController;
use App\Notifications\Enroll_course;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;

class CourseController extends BaseController
{


    function getEnrolledCoursesByUser()
    {
        $courses = Auth::user()->enrolled_course()->paginate(27);
        return view('student.course_enrolled', compact('courses'));

    }

    function enroll_and_in_enroll_course($slug)
    {
        $course= Course::where('slug_' . app()->getLocale(), $slug)->first();
        Auth::user()->enrolled_course()->toggle($course->id);


        $user = User::find($course->user_id);
        $user ->notify(new Enroll_course($course));
        return back();

    }


    function student_watch_lesson(Request $request)
    {

        $lesson = Auth::user()->student_watch_lesson()->where('lesson_student.lesson_id', $request->lesson_id)->first();
        if (empty($lesson))
            Auth::user()->student_watch_lesson()->attach($request->lesson_id);


        return response(['status' => true]);
    }

    function complete_watch_lesson(Request $request)
    {
        Auth::user()->student_watch_lesson()->syncWithoutDetaching([$request->lesson_id => ['is_completed' => true]]);

        return response(['status' => true]);

    }


    function certification($course_slug)
    {

        $course = Course::where('slug_ar', $course_slug)->orWhere('slug_en', $course_slug)->first();
        $certification = Certificate::where('course_id', $course->id)->where('user_id', \auth()->id())->first();
        View::share('certificate', $certification);

        if (\request()->has('download')) {

            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('certification.index');

            return $pdf->download('home.pdf');

        }

        return view('certification.index');

    }
}
