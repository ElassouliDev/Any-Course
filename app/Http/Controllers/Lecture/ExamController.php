<?php

namespace App\Http\Controllers\Lecture;

use App\Category;
use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\DataTables\Lecture\ExamDataTable;
use App\Exam;
use App\File;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\View\ExamRequest;
use App\Option_exam;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends BaseController
{
    public function index(ExamDataTable $exam, $slug)
    {

        $title = trans('admin.exams');
        return $exam->with('slug', $slug)->render('lecture.exam.index', compact('title', 'slug'));
    }


    public function store(ExamRequest $request, $slug)
    {
        $course = Course::where('slug_ar', $slug)->orWhere('slug_en', $slug)->first()->id;
        $exam = Exam::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'course_id' => $course,
            'user_id' => auth()->id(),
        ]);
        $array = [];
        foreach ($request->value_en as $key => $value) {
            $option = new Option_exam();
            $option['value_ar'] = $request->value_ar[$key];
            $option['value_en'] = $value;
            $option['is_correct'] = $request->is_correct == $key ? true : false;
            $array[] = $option;
        }
        $exam->option_exam()->saveMany($array);


        return response(['status' => true, 'message' => __('error.added_successfully')]);
    }

    public function update(ExamRequest $request, $course_id, $exam_id)
    {
        $exam = Exam::find($exam_id);
        $exam->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
        ]);
        $array = [];
        foreach ($exam->option_exam as $index=>$option) {

            $option['value_ar'] = $request->value_ar[$index];
            $option['value_en'] = $request->value_en[$index];
            $option['is_correct'] = $request->is_correct == $index ? true : false;
            $option->save();
        }
        $exam->option_exam()->saveMany($array);


        return response(['status' => true, 'message' => __('error.updated_successfully')]);
    }


    function uploadImage($image, $edit = null)
    {
        if ($edit != null)
            Storage::has($edit->image->file_path) ? Storage::delete($edit->image->file_path) : '';

        $file = $image->file('image')->store('image/courses');
        return $file;

    }

    public function show($exam_id)
    {
        $exam = Exam::find($exam_id);
        $show = view('lecture.exam.show', compact('exam'))->render();

        return response(['status' => true, 'show' => $show]);
    }

    public function edit($slug_course, $exam_id)
    {
        $exam = Exam::find($exam_id);
        $show = view('lecture.exam.edit', compact('exam'))->render();

        return response(['status' => true, 'show' => $show]);
    }

    public function destroy($slug, $exam_id)
    {
        Exam::find($exam_id)->delete();
        return response(['status' => true, 'message' => __('error.updated_successfully')]);

    }


}
