<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\BaseController;
use App\Http\Requests\View\QuestionRequest;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends BaseController
{

    function lesson_question($lesson_id)
    {
        $questions=Question::where('lesson_id',$lesson_id)->paginate(30);
        return view('lessons.list_question',compact('questions','lesson_id'));
    }
    function store(QuestionRequest $request)
    {
        $request['user_id']=\auth()->id();
        Question::create($request->all());
        return back();
    }
}
