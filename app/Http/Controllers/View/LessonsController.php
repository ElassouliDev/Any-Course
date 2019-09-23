<?php

namespace App\Http\Controllers\View;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    function lessons_list($slug, $lesson_slug = '')
    {

        $course = Course::where('slug_ar', $slug)->orWhere('slug_en', $slug)->first();
        $course_id = $course->id;
        $lessons = \App\Lesson::with(['student_watch_lesson' => function ($q) {
            $q->select('*')->where('lesson_student.user_id', auth()->id());
        }])->where('course_id', $course_id)->orderBy('id', 'asc')->get();
        if ($lesson_slug == '') {
            $lesson_watching = $lessons->first();
        } else {
            $lesson_watching = Lesson::where('slug_ar', $lesson_slug)->orWhere('slug_en', $lesson_slug)->first();
        }
        return view('lessons.lessons', compact('lessons', 'lesson_watching', 'course'));

    }

    function exams($slug)
    {

        $course = Course::where('slug_ar', $slug)->orWhere('slug_en', $slug)->first();
        $course_id = $course->id;

        $lessons = \App\Lesson::with(['student_watch_lesson' => function ($q) {
            $q->select('*')->where('lesson_student.user_id', auth()->id());
        }])->where('course_id', $course_id)->orderBy('id', 'asc')->get();

        $user_review = $course->ratings()->where('author_id', \auth()->id())->first();
        $user_comment_review = $course->comments()->where('user_id', \auth()->id())->first();
        return view('lessons.exam', compact('lessons', 'course', 'user_comment_review', 'user_review'));

    }

    function answerExam($slug, Request $request)
    {
        $course = Course::where('slug_ar', $slug)->orWhere('slug_en', $slug)->first();
        $exams = $course->exams;
        $data = explode(',', $request->data_answer);
        for ($i = 0; $i < count($data); $i += 2) {
            $exams->where('id', $data[$i])->first()
                ->option_exam->where('value_' . app()->getLocale(), $data[$i + 1])
                ->first()->answer()->sync(auth()->id());
        }

        return back();

    }

}
