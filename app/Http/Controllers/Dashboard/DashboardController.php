<?php

namespace App\Http\Controllers\Dashboard;

use App\Certificate;
use App\Charts\ChartJS;
use App\Course;
use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class DashboardController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $title = trans('admin.dashboard');
        $users = User::query();
        $users_count = $users->count();
        $lectures_count = $users->whereRoleIs('lecture')->count();
        $students_count = $users->whereRoleIs('student')->count();
        $courses_count = Course::count();
        $chart = $this->certificates_degree();
        return view('dashboard.dashboard',compact('title','users_count','lectures_count','students_count','courses_count','chart'));
    }

    public function certificates_degree(){

    $chart = new ChartJS();
    $courses = Course::all()->toArray();
    $certificates = Certificate::whereIn('course_id',Arr::pluck($courses,'id'))->orderBy('id','desc')->get()->groupBy('course_id')->map(function ($row){
            return $row->avg('degree');
        });
        $chart->labels(Arr::pluck($courses,'title_'.app()->getLocale()));
    $chart->dataset(trans('admin.certificates_data'),'line',Arr::flatten($certificates));
    return $chart;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
