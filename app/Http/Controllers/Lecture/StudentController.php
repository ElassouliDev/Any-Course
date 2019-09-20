<?php

namespace App\Http\Controllers\Lecture;

use App\Category;
use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\DataTables\Lecture\StudentDataTable;
use App\DataTables\Lecture\StudentsCoursesDataTable;
use App\File;
use App\Http\Requests\CourseRequest;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function showAllStudents(StudentsCoursesDataTable $studens )
    {

        $title = trans('course.all_students_in_courses');
        return $studens->render('lecture.student.all', compact('title'));

    }

    public function showCoursesStudents(StudentDataTable $studens ,$slug )
    {
//        $course_id = \request('course_id');
//        return dd($course_id);
        $title = trans('admin.courses');
        return $studens->with('slug',$slug)->render('lecture.student.index', compact('title','slug'));

//                dd(1);
    }


}
