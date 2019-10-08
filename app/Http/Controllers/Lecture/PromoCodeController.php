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
use Gabievi\Promocodes\Models\Promocode;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PromoCodeController extends BaseController
{


    public function index(PromoCodeDataTable $promoCodeDataTable)
    {
        $title = trans('admin.promocode');
        return $promoCodeDataTable->render('lecture.promocode.index', compact('title'));
    }


    public function UsePromocode_to_pay_course(Request $request)
    {
        try {
            $course = Course::find($request->course_id);

            if (Promocodes::check($request->promocode)) {


                $promocode = Promocodes::all()->where('code',$request->promocode)->first();
                $remain = $promocode->data['amount_remain'] ?? $promocode->data['amount'] ?? 0;
                $remain = floatval($remain);
                if ($remain >= $course->price) {
                    $data = $promocode->data;
                    $remain -= $course->price;
                    $data['amount_remain'] = $remain ;
                    $data['amount_demand'][] = ['cost' => $course->price, 'course_id' => $course->id, 'user_id' => auth()->id()];
                    $promocode->data= $data;
                    $promocode->save();
                    Auth::user()->enrolled_course()->attach($course->id);

                    return response(['status' => true, 'message' => trans('error.promocode_success')]);

                }
                if($remain <= 0){
                    Promocodes::disable($request->promocode);
                }
                return response(['status' => false, 'message' => trans('error.amount_not_valid')],403);


            }


        }catch (\Exception $exception) {}

        return response(['status' => false, 'message' => trans('error.promocode_not_valid')], 403);

    }

    public function store(Request $request)
    {
//        Promocodes::disable( "PK7Q-7B7T"); expire token and remove using soft deletes
//        Promocodes::redeem("JDV8-2UBW");
//      $dd=  Promocodes::apply("8PUJ-CMN3");

//        Promocode::deleting();
//        $data = Promocodes::all();
        $moreData = [
            'description' => $request->description,
            'amount' => $request->amount,
            'amount_remain' => $request->amount,
            'lecture_id' => auth()->id()
        ];

//        $data=auth()->user()->createCode($amount = 1, $reward = null);
//        $data = Promocodes::clearRedundant();
        $data = Promocodes::create(1, null, $moreData, null, null, false);

//        dd([$request->all(), $data]);

    }


}
