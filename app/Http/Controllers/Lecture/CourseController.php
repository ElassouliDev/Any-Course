<?php

namespace App\Http\Controllers\Lecture;

use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index(CourseDataTable $course)
    {
        /*$courses = Course::latest()->paginate(10);*/
        return $course->render('lecture.course', ['title' => trans('admin.courses')]);
    }


    public function store(CourseRequest $request)
    {


    }

}
