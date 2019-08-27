<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\DataTables\LessonDataTable;
use App\File;
use App\Http\Requests\LessonRequest;
use App\Lesson;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LessonDataTable $lesson)
    {
        return $lesson->render('dashboard.lesson.index', ['title' => trans('admin.Admin')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.add');
       $courses = Course::where('user_id',auth()->id())->get();
        return view('dashboard.lesson.create',compact('title','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {
//        return dd($request);
        $request['user_id'] = auth()->id();
       $lesson = Lesson::create($request->all());
       $file = new File() ;
       $file->file_path = $request->file_path;

        $lesson->file()->save($file);
        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.lesson.index');
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
    public function edit(Lesson $lesson)
    {
        $title = trans('admin.edit');
        $user = User::where('id',$lesson->user_id)->first();
        $courses = Course::where('user_id',$user->id)->get();

        return view('dashboard.lesson.edit',compact('title','lesson','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {

        $lesson->update($request->all());
        $file = new File() ;
        $file->file_path = $request->file_path;

        $file = $lesson->file;
        $file->file_path=$request->file_path;
        $file->update();
        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.lesson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        session()->flash('success',__('error.deleted_successfully'));
        return redirect()->route('dashboard.lesson.index');
    }
}
