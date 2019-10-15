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
        $course = Course::where('slug_' . app()->getLocale(), $slug)->first();
        Auth::user()->enrolled_course()->toggle($course->id);


        $user = User::find($course->user_id);
        $user->notify(new Enroll_course($course));
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


        ////////////// check if user complete course
        $course= \App\Lesson::find($request->lesson_id)->course;// find course id

        $lessons = \App\Lesson::with(['student_watch_lesson' => function ($q) {
            $q->select('*')->where('lesson_student.user_id', auth()->id());
        }])->where('course_id', $course->id)->orderBy('id', 'asc')->get();// find all lesson for check

        $GLOBALS['course_watching_completed'] = true; /// default user details
        $lessons->each(function ($lesson) {
            if($lesson->student_watch_lesson()->where('user_id',auth()->id())->where('is_completed',true)->count()==0){
                $GLOBALS['course_watching_completed']=false;
                return;
            };
        }); //

        $user_has_certification= $course->certifications->where('id',auth()->id())->count()==1;
        $course_watching_completed= $GLOBALS['course_watching_completed'] ;

        return response(['status' => true,'user_has_certification'=>$user_has_certification,'course_watching_completed'=>$course_watching_completed]);

    }


    function certification($course_slug)
    {

        $course = Course::where('slug_ar', $course_slug)->orWhere('slug_en', $course_slug)->first();
        $certification = Certificate::where('course_id', $course->id)->where('user_id', \auth()->id())->first();
        View::share('certificate', $certification);

        if (\request()->has('download')) {
            View::share('print', true);

            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('certification.index');

            return $pdf->download($course->title_en . '.pdf');

        }

        return view('certification.index');

    }
}
