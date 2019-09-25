<?php

namespace App\Http\Controllers\Student;

use App\Comment;
use App\Course;
use App\Http\Controllers\BaseController;
use App\Http\Requests\View\QuestionRequest;
use App\Lesson;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends BaseController
{

    function store(Request $request)
    {

        $lesson = Lesson::find($request->lesson_id);
        $comment = new Comment() ;
        $comment->content = $request['content'];
        $comment->user_id = \auth()->id();
        $lesson->comment()->save($comment);
        return back();
    }

    function delete(Comment $comment)
    {
      $comment->delete();

    }
    function store_question(Request $request){
        $question = Question::find($request->question_id);
        $comment = new Comment() ;
        $comment->content = $request['content'];
        $comment->user_id = \auth()->id();
        $question->comment()->save($comment);

        return back();

    }
}
