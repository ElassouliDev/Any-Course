<?php

namespace App\Http\Controllers\Lecture;

use App\Category;
use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\DataTables\Lecture\PromoCodeDataTable;
use App\DataTables\Lecture\StudentDataTable;
use App\DataTables\Lecture\StudentsCoursesDataTable;
use App\File;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CourseRequest;
use App\Tag;
use App\User;
use Gabievi\Promocodes\Facades\Promocodes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromoCodeController extends BaseController
{


    public function index(PromoCodeDataTable $promoCodeDataTable)
    {
        $title = trans('course.promocode');
        return $promoCodeDataTable->render('lecture.promocode.index', compact('title'));
    }

    public function store(Request $request)
    {
//        Promocodes::disable( "PK7Q-7B7T"); expire token and remove using soft deletes
//        Promocodes::redeem("JDV8-2UBW");
//      $dd=  Promocodes::apply("8PUJ-CMN3");

        $data = Promocodes::all();
        $moreData = [
            'description' => $request->description,
            'amount' => $request->amount,
            'lecture_id' => auth()->id()
        ];

//        $data=auth()->user()->createCode($amount = 1, $reward = null);
//        $data = Promocodes::clearRedundant();
        $data = Promocodes::create(12, null, $moreData, null, 21, false);

        dd([$request->all(), $data]);

    }


    public function showCoursesStudents(StudentDataTable $studens, $slug)
    {
        $id = Course::where('slug_en', $slug)->orWhere('slug_en', $slug)->first()->id;


        $title = trans('admin.courses');
        return $studens->with('id', $id)->render('lecture.student.index', compact('title', 'slug'));

    }


}
