<?php

namespace App\Http\Controllers\Lecture;

use App\Category;
use App\Course;
use App\DataTables\Lecture\CourseDataTable;
use App\File;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\View\LessonRequest;
use App\Lesson;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function index($slug)
    {
        /*$courses = Course::latest()->paginate(10);*/
        $id = Course::where('slug_ar' , $slug)->orWhere('slug_en',$slug)->first()->id;
        $course = Course::find($id);
        $title = trans('admin.lesson');
        return view('lecture.lesson.index', compact('title', 'course'));
    }


    public function store(LessonRequest $request)
    {

        $request['user_id'] = auth()->id();
        $lesson = Lesson::create($request->all());
        if ($request->has('file_path')) {
            $file = new File();
            $file->file_path = $request->file_path;
            $lesson->file()->save($file);

        }


        return back();
    }


    public function show($id)
    {
        //
    }

    public function edit($slug_course, $slug)
    {

        $lesson = Lesson::where('slug_ar' , $slug)->orWhere('slug_en',$slug)->first();
        $data = view('lecture.lesson.edit', compact('lesson'))->render();

        return response(['status' => true, 'data' => $data]);
    }

    public function update(LessonRequest $request, $slug_course, $slug)
    {
        $lesson = Lesson::where('slug_ar' , $slug)->orWhere('slug_en',$slug)->first();
        $lesson->update(
            ['title_ar' => $request['title_ar'],
                'title_en' => $request['title_en']
            ]
        );
        $lesson->file()->update(['file_path' => $request->file_path]);


        return back();
    }

    public function destroy($slug_course, $slug)
    {
        Lesson::where('slug_ar' , $slug)->orWhere('slug_en',$slug)->delete();
        return back();
    }


}
