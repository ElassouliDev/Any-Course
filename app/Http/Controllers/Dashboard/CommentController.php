<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\DataTables\CommentDataTable;
use App\File;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CommentRequest;
use App\Lesson;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CommentDataTable $Comment)
    {
        return $Comment->render('dashboard.comment.index', ['title' => trans('admin.comment')]);
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
        return view('dashboard.comment.create',compact('title','lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
//        return dd($request);
        $request['user_id'] = auth()->id();
       $Comment = Comment::create($request->all());
        session()->flash('success', __('error.added_successfully'));
        return redirect()->route('dashboard.comment.index');
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
    public function edit(Comment $Comment)
    {
        $title = trans('admin.edit');


        return view('dashboard.comment.edit',compact('title','Comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $Comment)
    {

        $Comment->update($request->all());
        session()->flash('success', __('error.updated_successfully'));
        return redirect()->route('dashboard.comment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $Comment)
    {
        $Comment->delete();
        session()->flash('success',__('error.deleted_successfully'));
        return redirect()->route('dashboard.comment.index');
    }
}
