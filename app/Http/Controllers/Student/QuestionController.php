<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\BaseController;
use App\Http\Requests\View\QuestionRequest;
use App\Lesson;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends BaseController
{

    function lesson_question($slug_course, $slug_lesson)
    {
        $lesson = Lesson::where('slug_en', $slug_lesson)->orWhere('slug_ar', $slug_lesson)->first();
        $course = Course::where('slug_en', $slug_course)->orWhere('slug_ar', $slug_course)->first();
        $questions = Question::where('lesson_id', $lesson->id)->paginate(30);
        return view('lessons.list_question', compact('questions', 'course','lesson'));
    }

    function store(QuestionRequest $request, $slug_course, $slug_lesson)
    {
        $lesson = Lesson::where('slug_en', $slug_lesson)->orWhere('slug_ar', $slug_lesson)->first();
        $request['user_id'] = \auth()->id();
        $request['lesson_id'] = $lesson->id;
        Question::create($request->all());
        return back();
    }
}
