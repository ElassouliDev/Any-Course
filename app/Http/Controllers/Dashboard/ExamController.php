<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\DataTables\ExamDataTable;
use App\File;
use App\Http\Controllers\BaseController;
use App\Http\Requests\ExamRequest;
use App\Lesson;
use App\Exam;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExamDataTable $Exam)
    {
        return $Exam->render('dashboard.exam.index', ['title' => trans('admin.exam')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.add');
        $courses = Course::get();
        return view('dashboard.exam.create',compact('title','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
//        return dd($request);
        $request['user_id'] = auth()->id();
       $Exam = Exam::create($request->all());
        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.exam.index');
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
    public function edit(Exam $Exam)
    {
        $title = trans('admin.edit');


        return view('dashboard.exam.edit',compact('title','Exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, Exam $Exam)
    {

        $Exam->update($request->all());
        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.exam.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $Exam)
    {
        $Exam->delete();
        session()->flash('success',__('error.deleted_successfully'));
        return redirect()->route('dashboard.exam.index');
    }
}
