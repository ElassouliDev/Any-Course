<?php

namespace App\Http\Controllers\Lecture;

use App\Category;
use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\DataTables\Lecture\StudentDataTable;
use App\File;
use App\Http\Requests\CourseRequest;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function showCourseStudent(StudentDataTable $studens)
    {

        $title = trans('admin.courses');
        return $studens->render('lecture.user.index', compact('title'));

    }

    public function showCoursesStudents(StudentDataTable $studens)
    {
        /*$courses = Course::has('student_course')->with(['student_course' => function ($q) {
            $q->has('user')->with(['user' => function ($qq) {
                $qq->with('image');
            }])->distinct();
        }])->where('user_id', auth()->id())->get()  ;*/

//                $user = User::has('student_course')->with(['image','student_course' => function ($q) {
/*                    $q->has('course')->with(['course' => function ($qq) {
                        $qq->where('course.user_id', auth()->id());
                    }])->distinct();*/
//                }])->get();
                /*dd($user);
        $title = trans('admin.courses');
        return $studens->render('lecture.user.index', compact('title'));*/

                dd(1);
    }


}
