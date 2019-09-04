<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    function  lessons_list($course_id){
        $lessons =\App\Lesson::where('course_id',$course_id)->orderBy('id','asc')->get();
//        dd($lessons);
        return view('lessons.lessons',compact('lessons'));
    }

}
