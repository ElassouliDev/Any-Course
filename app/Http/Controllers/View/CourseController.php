<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends BaseController
{
    function course_list()
    {
        $courses = \App\Course::where('status','published')->latest()->get();
        $courses_latest = $courses->take(6);
        $courses_all = $courses->take(12);
        return view('courses.all_courses', compact('courses', 'courses_all', 'courses_latest'));
    }


    function course_details($slug)
    {
        if(request('read') != null)
            \auth()->user()->unreadNotifications()->where('read_at',null)->where('id',\request('read'))->update(['read_at' => now()]);

        $course_id = \App\Course::where('slug_ar' , $slug)->orWhere('slug_en',$slug)->first()->id;
        $course = \App\Course::with(['students' => function ($q) use($course_id) {
            $q->where('course_student.user_id', Auth::id());
        }])->find($course_id);
        $course['is_enroll'] = (count($course->students) > 0) ? true : false;
        $reveiw_course = $course->comments()->has('rating')->with('rating')->get();
        unset($course->students);
        return view('courses.course_details', compact('course','reveiw_course'));
    }

}
