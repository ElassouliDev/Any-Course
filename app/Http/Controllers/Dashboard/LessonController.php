<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
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
    public function index(Request $request)
    {
        $title = trans('admin.lesson');
        $lessons = Lesson::where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('title_'.app()->getLocale(), 'like', '%' . $request->search . '%');


            });

        })->latest()->paginate(5);
        return view('dashboard.lesson.index',compact('title','lessons'));
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
        $request['user_id'] = auth()->id();
        Lesson::create($request->all());
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
