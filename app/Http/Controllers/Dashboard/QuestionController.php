<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\DataTables\QuestionDataTable;
use App\File;
use App\Http\Requests\QuestionRequest;
use App\Lesson;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuestionDataTable $question)
    {
        return $question->render('dashboard.question.index', ['title' => trans('admin.question')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = trans('admin.add');
        $lessons = Lesson::all();
        return view('dashboard.question.create',compact('title','lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
//        return dd($request);
        $request['user_id'] = auth()->id();
       $Question = Question::create($request->all());
        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.question.index');
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
    public function edit(Question $question)
    {
        $title = trans('admin.edit');


        return view('dashboard.Question.edit',compact('title','question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {

        $question->update($request->all());
        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        session()->flash('success',__('error.deleted_successfully'));
        return redirect()->route('dashboard.question.index');
    }
}
